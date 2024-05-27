<?php

namespace App\Http\Controllers\Gt_manager\Product_Listings;

use App\Models\Seller;
use App\Models\Product;
use App\Models\ProductSku;
use App\Models\Storehouse;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductListingsController extends Controller
{
    // -------------------------- Method -------------------------- //
    public function index()
    {
        // // Fetch the latest product listings with associated skus
        // $product_listings = ProductListing::with('skus')->latest()->get();

        // // Prepare arrays to store associated data
        // $products = [];
        // $manufacturers = [];
        // $storehouses = [];

        // // Iterate over each product listing to gather associated data
        // foreach ($product_listings as $product_listing) {
        //     foreach ($product_listing->skus as $sku) {
        //         // Retrieve product and manufacturer
        //         $product = $sku->product;
        //         $manufacturer = optional($product->manufacturer);
        //         // Retrieve storehouse
        //         $storehouse = $product_listing->storehouse;

        //         // Add product, manufacturer, and storehouse to arrays
        //         $products[$product_listing->id] = $product;
        //         $manufacturers[$product_listing->id] = $manufacturer;
        //         $storehouses[$product_listing->id] = $storehouse;
        //     }
        // }

        $sellersStock = Seller::with('storehouses.productListings.skus.images')->get();

        // Pass the data to the view
        return view('gt-manager.pages.product_listings.index',
        compact('sellersStock'));
    }
    // -------------------------- Method -------------------------- //
    public function add()
    {
        $storehouses = Storehouse::latest()->get();

        return view('gt-manager.pages.product_listings.add', compact('storehouses'));
    }
    // -------------------------- Method -------------------------- //

    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'seller_id' => 'exists:sellers,id',
            'storehouse' => 'required|exists:storehouses,id',
            'sku' => 'required|exists:product_skus,sku',
            'qty' => 'required|integer|min:1',
            'selling_price' => 'required|min:0',
        ]);

        // Check for the duplicate entry
        $existingListing = ProductListing::where('storehouse_id', $request->storehouse)
            ->where('sku', $request->sku)
            ->first();

        if ($existingListing) {
            // Flash an error message to the session
            return redirect()->back()->with('fail', 'The SKU already exists in the selected storehouse.')->withInput();
        }

        // Properties
        $skuData = ProductSku::where('sku', $validatedData['sku'])->first();
        $productID = $skuData->product_id;
        $product = Product::where('id', '=', $productID)->first();
        $manufacturer = Manufacturer::where('id', '=', $product->manufacturer_id)->first();
        $seller_id = Manufacturer::where('id', '=', $product->manufacturer_id)->first();

        // Store the listing
        $product_listing = ProductListing::create([
            'seller_id' => 1,
            'storehouse_id' => $request->storehouse,
            'manufacturer_id' => $manufacturer->id,
            'product_id' => $product->id,
            'product_sku_id' => $skuData->id,
            'sku' => $request->sku,
            'qty' => $request->qty,
            'selling_price' => $request->selling_price,
        ]);

        // Now you can continue with your logic
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('product-listings.index');
    }

}
