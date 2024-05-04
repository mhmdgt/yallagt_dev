<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Http\Controllers\Controller;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\StockCar;
use App\Models\StockCarImage;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class StockCarsController extends Controller
{
    // -------------------- Show All Brands -------------------- //
    public function index()
    {
        $brands = CarBrand::latest()->get();
        
        return view('gt-manager.pages.stock_cars.index', compact('brands'));
    }
    // -------------------- Show Brand Models  -------------------- //
    public function show($slug)
    {
        $brandData = CarBrand::getByTranslatedSlug($slug)->first();
        $brandModels = CarBrandModel::with([
            'stockCars' => function ($query) {
                $query->with(['images', 'stockCarCategories' => function ($subQuery) {
                    $subQuery->orderBy('price', 'asc');
                }]);
            },
        ])->where('car_brand_id', $brandData->id)->get();

        return view('gt-manager.pages.stock_cars.stock_car_models.show', compact('brandData', 'brandModels'));
    }
    // -------------------- Maghrabi Brand Model -------------------- //
    // public function create($brandSlug,$modelSlug, $stockYear)
    // {
    //     $brandData = CarBrand::where('slug', $brandSlug)->first();
    //     $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();

    //     if($modelSlug != '-' && $stockYear != '-'){
    //         $stockCar = StockCar::where('year', $stockYear)->with('images')->first();
    //         $modelData = CarBrandModel::find($stockCar->car_brand_model_id);
    //         $images = $stockCar->images;

    //         // Brand name
    //         // $imageParameter = $request->input('image');
    //         // $imageData = json_decode($imageParameter, true);
    //         // $brandData = $imageData['brandData'];

    //         // dd( $brandData['slug']);
    //         // $brandData = $brandData['slug'];
    //         dd( $stockCar->id );

    //         return view('gt-manager.pages.stock_cars.stock_car_models.edit',
    //             compact('brandData',
    //                 'brandSlug',
    //                 'modelData',
    //                 'modelSlug',
    //                 'brandModels',
    //                 'images',
    //                 'stockCar'
    //             ));
    //     }else{

    //         return view('gt-manager.pages.stock_cars.stock_car_models.create', compact('brandData', 'brandSlug', 'brandModels'));
    //     }

    // }
    // -------------------- Create Brand Model -------------------- //
    public function create($slug)
    {
        $brandData = CarBrand::getByTranslatedSlug($slug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        return view('gt-manager.pages.stock_cars.stock_car_models.create', compact('brandData', 'brandModels'));
    }
    // -------------------- Image TmpUpload -------------------- //
    public function TmpUpload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');

            // Brand name
            $imageParameter = $request->input('image');
            $imageData = json_decode($imageParameter, true);
            $brandData = $imageData['brandData'];
            // dd($imageData);
            // dd($imageParameter);

            // Convert to Jpeg
            $manager = new ImageManager(new Driver());
            $imageMngr = $manager->read($image);
            $encoded = $imageMngr->toJpeg(80); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = $brandData . '-' . bin2hex(random_bytes(16)) . '.jpg';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/stock_car_imgs/' . $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName,
            ]);
            return $fileName;

        } else {
            return response()->json(['error' => 'saving failed'], 400);
        }
    }
    // -------------------- Image TmpDelete -------------------- //
    public function TmpDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImages->name);
            $temporaryImages->delete();
            return 'Done!';
        } else {
            return response()->json(['error' => 'deleting file failed'], 400);
        }
    }
    // -------------------- Store Stock Car -------------------- //
    public function store(Request $request)
    {
        // dd($request->all());
        // Chech The Validation
        $validator = Validator::make($request->all(), [
            'car_brand_model_id' => 'required|exists:car_brand_models,id',
            'year' => 'required|integer|digits:4',
            'brochure' => 'file|mimes:pdf',
        ]);
        // Properties
        $temporaryImages = TemporaryFile::all();
        $BrandModel = CarBrandModel::with('brand')->find($request->car_brand_model_id);
        $brand = $BrandModel->brand;
        $brandModelSlug = $BrandModel->slug;
        $ModelYear = $request->year;
        $brochure = null;
        $firstImage = 1;
        // Remove TMP images if validation fails
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Check if request has a brochure
        if ($request->brochure) {
            $brochure = $brand['slug'] . '_' . $brandModelSlug . '_brochure' . '_' . $ModelYear . '.' . $request->brochure->extension();
            $request->brochure->storeAs('media/stock_car_brochures/' . $brochure);
        }
        // store stock car into the database
        $stock_car = StockCar::create([
            'car_brand_model_id' => $BrandModel->id,
            'year' => $request->year,
            'brochure' => $brochure,
            'status' => 'active',
        ]);
        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/stock_car_imgs/' . $temporaryImage->name,
                'media/stock_cars_imgs/' . $temporaryImage->name);

            StockCarImage::create([
                'stock_car_id' => $stock_car->id,
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        // Success message
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('stock-car.show', $brand->slug);
    }
    // -------------------- Edit Stock Car -------------------- //
    public function edit($slug, $modelSlug, $stockYear, $id)
    {

        $brandData = CarBrand::getByTranslatedSlug($slug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        $stockCar = StockCar::with('images')->find($id);
        $modelData = CarBrandModel::find($stockCar->car_brand_model_id);
        $images = $stockCar->images;
        return view('gt-manager.pages.stock_cars.stock_car_models.edit',
            compact('brandData', 'modelData', 'modelSlug', 'brandModels', 'images', 'stockCar'));
    }
    // -------------------- Update Stock Car -------------------- //
    public function update(Request $request, $stockCar)
    {
        // Chech The Validation
        $validator = Validator::make($request->all(), [
            'car_brand_model_id' => 'required|exists:car_brand_models,id',
            'year' => 'required|integer|digits:4',
            'brochure' => 'file|mimes:pdf',
            'main_img' => 'required', // Ensure main_img is present
        ]);
        // Properties
        $temporaryImages = TemporaryFile::all();
        $BrandModel = CarBrandModel::with('brand')->find($request->car_brand_model_id);
        $brand = $BrandModel->brand;
        $brandModelSlug = $BrandModel->slug;
        $ModelYear = $request->year;
        $brochure = null;
        $stockCar = StockCar::with('images')->findOrFail($stockCar);
        // Remove TMP images if validation failed
        if ($validator->fails()) {
            Session::flash('fail', 'Please select main photo');
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Update The Brochure
        if ($request->brochure) {
            $brochure = $brand['slug'] . '_' . $brandModelSlug . '_brochure' . '_' . $ModelYear . '.' . $request->brochure->extension();
            $request->brochure->storeAs('media/stock_car_brochures/' . $brochure);
        }
        // Update Stock Car Data
        $stockCar->update([
            'car_brand_model_id' => $BrandModel->id,
            'year' => $request->year,
            'brochure' => $brochure,
            'status' => $request->status,
        ]);
        // Deleted removed images and leave only stayed images into the update request
        if ($request->has('images')) {
            // Get the list of image names from the request
            $requestedImageNames = collect($request->images)->pluck('name')->toArray();

            // Find the existing images associated with the stock car
            $existingImages = $stockCar->images;

            // Store the main image ID before removal
            $mainImageId = null;
            foreach ($existingImages as $image) {
                if ($image->main_img === '1') {
                    $mainImageId = $image->id;
                    break;
                }
            }

            // Determine which images should be removed
            $imagesToRemove = [];
            foreach ($existingImages as $image) {
                if (!in_array($image->name, $requestedImageNames)) {
                    $imagesToRemove[] = $image->id;
                }
            }

            // Remove the images that are not included in the request
            $stockCar->images()->whereIn('id', $imagesToRemove)->delete();

            // Update the names of the existing images
            foreach ($request->images as $imageData) {
                $imageName = $imageData['name'];
                $stockCar->images()->where('name', $imageName)->update(['name' => $imageName]);
            }

            // If no new main image is selected, retain the existing main image
            if ($mainImageId) {
                $stockCar->images()->where('id', $mainImageId)->update(['main_img' => '1']);
            }

            // Update the main_img value
            if (!$request->has('main_img')) {
                // Check if there are images in the request
                if (!empty($request->images)) {
                    // Get the ID of the first image in the request
                    $newMainImageId = key($request->images);
                } else {
                    // No images in the request, set main_img to null
                    $newMainImageId = null;
                }
            } else {
                $newMainImageId = $request->main_img;
            }

            // If main_img is null, set it to the ID of the first image in the request
            if ($newMainImageId === null && isset($request->images[0])) {
                $newMainImageId = $request->images[0]['id'];
            }

            // Reset main_img to 0 for all images except the new main image
            $stockCar->images()->where('id', '!=', $newMainImageId)->update(['main_img' => '0']);

            // Set the new main_img value to 1 for the image with the new main image ID
            $stockCar->images()->where('id', $newMainImageId)->update(['main_img' => '1']);

        }
        // Store new images
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/stock_car_imgs/' . $temporaryImage->name,
                'media/stock_cars_imgs/' . $temporaryImage->name);

            // Skip setting the main_img value if it's explicitly provided in the request
            if (!$request->has('main_img')) {
                $mainImageId = $temporaryImage->id; // Assuming $temporaryImage->id is the ID of the newly added image
            }

            StockCarImage::create([
                'stock_car_id' => $request->stockCar,
                'name' => $temporaryImage->name,
                'main_img' => "0",
            ]);

            Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        // Success message
        Session::flash('success', 'Update Successfully');
        return redirect()->route('stock-car.show', $brand->slug);
    }
    // -------------------- Destroy Stock Car -------------------- //
    public function delete(StockCar $stockCar)
    {
        $stockCar->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->back();
    }
}
