<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Models\CarBrand;
use App\Models\StockCar;
use Illuminate\Http\Request;
use App\Models\CarBrandModel;
use App\Models\StockCarImage;
use App\Models\TemporaryFile;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Imagick\Driver;
use App\Http\Requests\GtManager\StockCar\UpdateRequest;
use App\Http\Requests\GtManager\StockCar\StoreStockCarRequest;

class StockCarsController extends Controller
{
    // -------------------- Show All Brands -------------------- //
    public function index()
    {
        $brands = CarBrand::latest()->get();
        return view('gt-manager.pages.stock_cars.index', compact('brands'));
    }
    // -------------------- Show Brand Models  -------------------- //
    public function show($brandSlug)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::with([
            'stockCars' => function ($query) {
                $query->with(['images', 'stockCarCategories' => function ($subQuery) {
                    $subQuery->orderBy('price', 'asc');
                }]);
            },
        ])->where('car_brand_id', $brandData->id)->get();

        return view('gt-manager.pages.stock_cars.stock_car_models.show', compact('brandData', 'brandSlug', 'brandModels'));
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
    public function create($brandSlug)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        return view('gt-manager.pages.stock_cars.stock_car_models.create', compact('brandData', 'brandSlug', 'brandModels'));
    }
    // -------------------- Edit Stock Car -------------------- //
    public function edit($brandSlug, $modelSlug, $stockYear, $id)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        $stockCar = StockCar::with('images')->find($id);
        $modelData = CarBrandModel::find($stockCar->car_brand_model_id);
        $images = $stockCar->images;

        // dd( $brandModels[] );
        // dd( $stockCar->id , $brandData->name , $modelSlug , $modelData->id , $modelData->name , $stockCar->year , $images );
        return view('gt-manager.pages.stock_cars.stock_car_models.edit',
            compact('brandData', 'brandSlug', 'modelData', 'modelSlug', 'brandModels', 'images', 'stockCar'));
    }
    // -------------------- Image TmpUpload -------------------- //
    public function TmpUpload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->file('image');

            // Brand name
            $imageParameter = $request->input('image');
            $imageData = json_decode($imageParameter, true);
            // dd($imageData);
            $brandData = $imageData['brandData'];
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
    public function store(StoreStockCarRequest $request)
    {
        $BrandModel = CarBrandModel::with('brand')->find($request->car_brand_model_id);
        $temporaryImages = TemporaryFile::all();
        $brand = $BrandModel->brand;
        $brandModelSlug = $BrandModel->slug;
        $ModelYear = $request->year;
        $brochure = null;
        $firstImage = true;

        // dd( $BrandModel->id );
        if ($request->brochure) {
            $brochure = $brand['slug'] . '_' . $brandModelSlug . '_brochure' . '_' . $ModelYear . '.' . $request->brochure->extension();
            $request->brochure->storeAs('media/stock_car_brochure/' . $brochure);
        }

        $stock_car = StockCar::create([
            'car_brand_model_id' => $BrandModel->id,
            'year' => $request->year,
            'brochure' => $brochure,
            'status' => 'active',
        ]);

        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/stock_car_imgs/' . $temporaryImage->name,
                'media/stock_cars_imgs/' . $temporaryImage->name);

            StockCarImage::create([
                'stock_car_id' => $stock_car->id,
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? 1 : 0, // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        Session::flash('success', 'Model Stored Successfully');
        return redirect()->route('stock-car.show', ['brandSlug' => $brand->slug]);
    }
    // -------------------- Update Stock Car -------------------- //
    public function update(UpdateRequest $request, $stockCar)
    {

        $BrandModel = CarBrandModel::with('brand')->find($request->car_brand_model_id);
        $temporaryImages = TemporaryFile::all();
        $brand = $BrandModel->brand;
        $brandModelSlug = $BrandModel->slug;
        $ModelYear = $request->year;
        $brochure = null;
        $firstImage = true;
        $stockCar = StockCar::findOrFail($stockCar);

        if ($request->brochure) {
            $brochure = $brand['slug'] . '_' . $brandModelSlug . '_brochure' . '_' . $ModelYear . '.' . $request->brochure->extension();
            $request->brochure->storeAs('media/stock_car_brochure/' . $brochure);
        }

        $stockCar->update([
            'car_brand_model_id' => $BrandModel->id,
            'year' => $request->year,
            'brochure' => $brochure,
            'status' => 'active',
        ]);


        // Delete existing images associated with the stock car
        foreach ($stockCar->images as $image) {
            $image->delete();
        };


        // Store new images
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/stock_car_imgs/' . $temporaryImage->name,
                'media/stock_cars_imgs/' . $temporaryImage->name);

            $image = $stockCar->images()->create([
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? 1 : 0, // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/stock_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        Session::flash('success', 'Model Updated Successfully');
        return redirect()->route('stock-car.show', ['brandSlug' => $brand->slug]);
    }

    // -------------------- Destroy Stock Car -------------------- //
    public function delete(StockCar $stockCar)
    {
        $stockCar->delete();
        return redirect()->back();
    }

} // End Class


// if ($request->validated()->fails()) {
//     dd('hi');
// foreach ($temporaryImages as $temporaryImage) {
//     Storage::deleteDirectory('tmp/stock_car_imgs/' . $temporaryImage->folder);
//     $temporaryImage->delete();
// }
// }


// Brand name
// $imageParameter = $request->input('image');
// $imageData = json_decode($imageParameter, true);
// $brandData = $imageData['brandData'];
// $brandData = $brandData['slug'];
