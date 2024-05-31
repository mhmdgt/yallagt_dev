<?php

namespace App\Http\Controllers\Gt_manager\Product_Listings;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductListing;
use App\Models\ProductSku;
use App\Models\Seller;
use App\Models\Storehouse;
use App\Models\UserCartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductListingsController extends Controller
{
    // -------------------------- Method -------------------------- //
    public function index()
    {
        // // Fetch the latest product listings with associated skus
        $product_listings = ProductListing::with('seller', 'skus')->latest()->get();

        // Prepare arrays to store associated data
        $products = [];
        $manufacturers = [];
        $storehouses = [];

        // Iterate over each product listing to gather associated data
        foreach ($product_listings as $product_listing) {
            foreach ($product_listing->skus as $sku) {
                // Retrieve product and manufacturer
                $product = $sku->product;
                $manufacturer = optional($product->manufacturer);
                // Retrieve storehouse
                $storehouse = $product_listing->storehouse;

                // Add product, manufacturer, and storehouse to arrays
                $products[$product_listing->id] = $product;
                $manufacturers[$product_listing->id] = $manufacturer;
                $storehouses[$product_listing->id] = $storehouse;
            }
        }

        // Pass the data to the view
        return view('gt-manager.pages.product_listings.index',
            compact('product_listings'));
    }
    // -------------------------- Method -------------------------- //
    public function create()
    {
        $sellers = Seller::with('storehouses')->latest()->get();
        $storehouses = Storehouse::latest()->get();

        return view('gt-manager.pages.product_listings.create', compact('sellers', 'storehouses'));
    }
    // -------------------------- Method -------------------------- //
    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'seller_id' => 'exists:sellers,id',
            'sku' => 'required|exists:product_skus,sku',
            'selling_price' => 'required|min:0',
        ]);

        // Check for the duplicate entry
        $existingListing = ProductListing::where('seller_id', $request->seller_id)
            ->where('sku', $request->sku)
            ->first();

        if ($existingListing) {
            // Flash an error message to the session
            return redirect()->back()->with('fail', 'The SKU already exists in the selected Seller.')->withInput();
        }

        // Properties
        $skuData = ProductSku::where('sku', $validatedData['sku'])->first();
        $productID = $skuData->product_id;
        $product = Product::where('id', '=', $productID)->first();
        $manufacturer = Manufacturer::where('id', '=', $product->manufacturer_id)->first();

        // Store the listing
        $product_listing = ProductListing::create([
            'seller_id' => $request->seller_id,
            'manufacturer_id' => $manufacturer->id,
            'product_id' => $product->id,
            'product_sku_id' => $skuData->id,
            'sku' => $request->sku,
            'selling_price' => str_replace(',', '', $request->input('selling_price')),

        ]);

        // Now you can continue with your logic
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('product-listings.index');
    }
    // -------------------------- Method -------------------------- //
    public function edit($id)
    {
        $listing = ProductListing::Where('id', $id)->with('seller', 'skus')->get()->first();
        $sellers = Seller::with('storehouses')->latest()->get();
        $storehouses = Storehouse::latest()->get();

        return view('gt-manager.pages.product_listings.edit', compact('listing', 'sellers', 'storehouses'));
    }
    // -------------------------- Method -------------------------- //
    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'seller_id' => 'exists:sellers,id',
            'sku' => 'required|exists:product_skus,sku',
            'selling_price' => 'required|min:0',
        ]);

        // Find the existing product listing
        $productListing = ProductListing::find($id);

        if (!$productListing) {
            // Flash an error message to the session if the listing doesn't exist
            return redirect()->back()->with('fail', 'Product listing not found.')->withInput();
        }

        // Check for the duplicate entry
        $existingListing = ProductListing::where('seller_id', $request->seller_id)
            ->where('sku', $request->sku)
            ->where('id', '!=', $id)
            ->first();

        if ($existingListing) {
            // Flash an error message to the session
            return redirect()->back()->with('fail', 'The SKU already exists in the selected Seller.')->withInput();
        }

        // Properties
        $skuData = ProductSku::where('sku', $validatedData['sku'])->first();
        $productID = $skuData->product_id;
        $product = Product::where('id', '=', $productID)->first();
        $manufacturer = Manufacturer::where('id', '=', $product->manufacturer_id)->first();

        // Update the listing
        $productListing->update([
            'seller_id' => $request->seller_id,
            'manufacturer_id' => $manufacturer->id,
            'product_id' => $product->id,
            'product_sku_id' => $skuData->id,
            'sku' => $request->sku,
            'selling_price' => str_replace(',', '', $request->input('selling_price')),
        ]);

        // Fetch the items to be updated
        $items = UserCartItem::where('product_listing_id', $productListing->id)->with('userCart')->get();

        // New upcoming price
        $newPrice = $productListing->selling_price; // Set the new price you want to update to

        if ($items->isNotEmpty()) {
            foreach ($items as $item) {
                // Calculate the new total price per item
                $item->total_price_per_item = $newPrice;

                // Update the item
                $item->save();
            }
        }

        // Now you can continue with your logic
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('product-listings.index');
    }

}
