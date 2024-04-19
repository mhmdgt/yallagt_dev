<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\StockCar\StoreStockCarRequest;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\StockCar;
use App\Models\StockCarImage;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
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
    public function show($brandSlug)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::with([
            'stockCars' => function ($query) {
                // Eager load 'stockCars' and 'stockCars.stockCarCategories' relationships
                $query->with(['images', 'stockCarCategories' => function ($subQuery) {
                    // Order 'stockCarCategories' by 'price' in ascending order
            $subQuery->orderBy('price', 'asc');
                }]);
            }
        ])->where('car_brand_id', $brandData->id)->get();
        //  dd($brandModels[2]->stockCars);
       
        return view('gt-manager.pages.stock_cars.stock_car_models.show', compact('brandData', 'brandSlug', 'brandModels'));
    }

    // -------------------- Create Brand Model -------------------- //
    public function create($brandSlug)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        return view('gt-manager.pages.stock_cars.stock_car_models.create', compact('brandData', 'brandSlug', 'brandModels'));
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

            // Convert to webP
            $manager = new ImageManager(new Driver());
            $imageMngr = $manager->read($image);
            $encoded = $imageMngr->toJpeg(60); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = $brandData . '-' . bin2hex(random_bytes(16)) . '.jpg';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/stock_car_imgs/'. $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName
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
        $directory = 'filepond-tmp/stock_car_imgs/' . $temporaryImages->name;

        if (Storage::disk('public')->exists($directory)) {
            Storage::delete($directory);
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

        if ($request->has($request->brochure)) {
            $brochure = $brand['slug'] . '_' . $brandModelSlug . '_brochure' . '_' . $ModelYear . '.' . $request->brochure->extension();
            $request->brochure->storeAs('media/stock_car_brochure/' . $brochure);
        }

        $stock_car = StockCar::create([
            'car_brand_model_id' => $request->car_brand_model_id,
            'year' => $request->year,
            'brochure' => $brochure,
            'status' => 'active',
        ]);

        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/stock_car_imgs/' . $temporaryImage->folder . '/' . $temporaryImage->file,
                'media/stock_cars_imgs/' . $temporaryImage->folder . '/' . $temporaryImage->file);

            StockCarImage::create([
                'stock_car_id' => $stock_car->id,
                'name' => $temporaryImage->file,
                'path' => $temporaryImage->folder,
                'main_img' => $firstImage ? 1 : 0, // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::deleteDirectory('filepond-tmp/stock_car_imgs/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        Session::flash('success', 'Model Stored Successfully');
        return redirect()->route('stock-car.show', ['brandSlug' => $brand->slug]);
    }
    // -------------------- Edit Stock Car -------------------- //
    public function edit($brandSlug, $modelSlug, $stockYear)
    {
        $brandData = CarBrand::where('slug', $brandSlug)->first();
        $brandModels = CarBrandModel::Where('car_brand_id', $brandData->id)->get();
        $stockCar = StockCar::where('year', $stockYear)->with('images')->first();
        $modelData = CarBrandModel::find($stockCar->car_brand_model_id);
        // $images = StockCarImage::with('images')->Where('stock_car_id', $brandData->id)->get();
        $images = $stockCar->images;

        // dd( $stockCar->status );
        return view('gt-manager.pages.stock_cars.stock_car_models.edit',
            compact('brandData',
                'brandSlug',
                'modelData',
                'modelSlug',
                'brandModels',
                'images',
                'stockCar'
            ));
    }
    // -------------------- Update Stock Car -------------------- //
    public function update(StoreStockCarRequest $request)
    {

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
