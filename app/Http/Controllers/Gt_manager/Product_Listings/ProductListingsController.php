<?php

namespace App\Http\Controllers\Gt_manager\Product_Listings;

use App\Http\Controllers\Controller;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductListing;
use App\Models\ProductSku;
use App\Models\Storehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductListingsController extends Controller
{
    // -------------------------- Method -------------------------- //
    public function index()
    {
        // Fetch the latest product listings with associated skus
        $product_listings = ProductListing::with('skus')->latest()->get();

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
        return view('gt-manager.pages.product_listings.index', compact('product_listings', 'products', 'manufacturers', 'storehouses'));
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

        // Store the listing
        $product_listing = ProductListing::create([
            'manufacturer_id' => $manufacturer->id,
            'product_id' => $product->id,
            'sku' => $request->sku,
            "product_sku_id"=>ProductSku::where('sku', $request->sku)->first()->id,
            'qty' => $request->qty,
            'selling_price' => $request->selling_price,
            'storehouse_id' => $request->storehouse,
        ]);

        // Now you can continue with your logic
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('product-listings.index');
    }

}
