<?php

namespace App\Http\Controllers\Gt_manager\Sale_cars;

use App\Http\Controllers\Controller;
use App\Models\BodyShape;
use App\Models\CarBrand;
use App\Models\CarBrandModel;
use App\Models\Color;
use App\Models\EngineAspiration;
use App\Models\EngineCc;
use App\Models\EngineKm;
use App\Models\Feature;
use App\Models\FuelType;
use App\Models\Governorate;
use App\Models\PaymentMethods;
use App\Models\SaleCar;
use App\Models\SaleCarImages;
use App\Models\SaleCondition;
use App\Models\TemporaryFile;
use App\Models\TransmissionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;

class SaleCarsController extends Controller
{
    // -------------------- Jquery Method Link -------------------- //
    public function getModelsByBrand($brandId)
    {
        $brand = CarBrand::findOrFail($brandId);
        $models = $brand->models()->select('id', 'name')->get();
        return response()->json($models);
    }
    // -------------------- Method -------------------- //
    public function SaleCarTmpUpload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->image;

            // Convert to Jpeg
            $manager = new ImageManager(new Driver());
            $imageMngr = $manager->read($image);
            $encoded = $imageMngr->toJpeg(80); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = 'SALE-' . bin2hex(random_bytes(16)) . '.jpg';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/sale_car_imgs/' . $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName,
            ]);

            return $fileName;
        } else {
            return response()->json(['error' => 'saving failed'], 400);
        }
    }
    // -------------------- Method -------------------- //
    public function SaleCarTmpDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/sale_car_imgs/' . $temporaryImages->name);
            $temporaryImages->delete();
            return 'Done!';
        } else {
            return response()->json(['error' => 'deleting file failed'], 400);
        }
    }
    // -------------------- Method -------------------- //
    public function create()
    {
        $brands = CarBrand::orderBy('name')->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $shapes = BodyShape::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $trans_types = TransmissionType::orderBy('name')->get();
        $FuelTypes = FuelType::orderBy('name')->get();
        $EngineAspirations = EngineAspiration::orderBy('name')->get();
        $EngineKMS = EngineKm::orderBy('name')->get();
        $engineCCS = EngineCc::orderBy('name')->get();
        $governorates = Governorate::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $conditions = SaleCondition::orderBy('name')->get();
        $paymentMethods = PaymentMethods::orderBy('name')->whereIn('id', [1, 4])->get();

        return view('gt-manager.pages.sale_cars.create',
            compact('brands', 'models',
                'conditions', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'paymentMethods', 'governorates'));

    }
    // -------------------- Method -------------------- //
    public function edit($slug)
    {
        $car = SaleCar::getByTranslatedSlug($slug)->first();
        // dd($car->description);
        $brands = CarBrand::orderBy('name')->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $modelName = CarBrandModel::findOrFail($car->model)->name;
        $shapes = BodyShape::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $trans_types = TransmissionType::orderBy('name')->get();
        $FuelTypes = FuelType::orderBy('name')->get();
        $EngineAspirations = EngineAspiration::orderBy('name')->get();
        $EngineKMS = EngineKm::orderBy('name')->get();
        $engineCCS = EngineCc::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $governorates = Governorate::orderBy('name')->get();
        $conditions = SaleCondition::orderBy('name')->get();
        $paymentMethods = PaymentMethods::orderBy('name')->whereIn('id', [1, 4])->get();

        // dd($car->model);
        return view('gt-manager.pages.sale_cars.edit',
            compact('car', 'brands', 'models', 'modelName',
                'shapes', 'colors', 'trans_types', 'EngineAspirations', 'FuelTypes',
                'engineCCS', 'EngineKMS', 'features', 'governorates', 'conditions', 'paymentMethods'));
    }
    // -------------------- Method -------------------- //
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'brand' => 'required|exists:car_brands,id',
            'model' => 'required|exists:car_brand_models,id',
            'year' => 'required',
            'color' => 'required',
            'image' => 'required',
            'condition' => 'required',
            'payment' => 'required',
            'price' => 'required',
            'description' => 'required|string|max:4200',
            'bodyShape' => 'required',
            'transmission' => 'required',
            'fuelType' => 'required',
            'cc' => 'required',
            'features' => 'required',
            'aspiration' => 'required',
            'km' => 'required',
            'governorate' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
        ]);
        // Check the Validation
        $temporaryImages = TemporaryFile::all();
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/sale_car_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Get the names corresponding to the IDs
        $firstImage = 1;
        $brand = CarBrand::findOrFail($request->input('brand'));
        $brand_en = $brand->name;
        $brand_ar = $brand->getTranslation('name', 'ar');
        $model = CarBrandModel::findOrFail($request->input('model'));
        $model_en = $model->name;
        $model_ar = $model->getTranslation('name', 'ar');
        $trans = TransmissionType::findOrFail($request->input('transmission'));
        $trans_en = $trans->name;
        $trans_ar = $trans->getTranslation('name', 'ar');
        $year = $request->input('year');
        $condition = SaleCondition::findOrFail($request->input('condition'));
        $condition_en = $condition->name;
        $condition_ar = $condition->getTranslation('name', 'ar');
        $selectedFeatures = $request->input('features', []);
        $featuresJson = json_encode($selectedFeatures);
        $uniqueId = uniqueRandEight();

        // Replacing spaces with dashes
        $slug_en = implode('-', [$brand_en, $model_en, $trans_en, $year, $condition_en, $uniqueId]);
        $slug_en = str_replace(' ', '-', $slug_en);
        $slug_ar = implode('-', [$uniqueId, $brand_ar, $model_ar, $trans_ar, $condition_ar, $year]);
        $slug_ar = str_replace(' ', '-', $slug_ar);
        $slug = ["en" => $slug_en, "ar" => $slug_ar];

        // Create a new SaleCar instance and populate its properties
        $car = SaleCar::create([
            'slug' => $slug,
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'condition' => $request->input('condition'),
            'payment' => $request->input('payment'),
            'price' => str_replace(',', '', $request->input('price')),
            'description' => $request->input('description'),
            'bodyShape' => $request->input('bodyShape'),
            'transmission' => $request->input('transmission'),
            'fuelType' => $request->input('fuelType'),
            'cc' => $request->input('cc'),
            'features' => $featuresJson,
            'aspiration' => $request->input('aspiration'),
            'km' => $request->input('km'),
            'governorate' => $request->input('governorate'),
            'user_name' => $request->input('user_name'),
            'phone' => $request->input('phone'),
        ]);
        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/sale_car_imgs/' . $temporaryImage->name,
                'media/sale_car_imgs/' . $temporaryImage->name);

            SaleCarImages::create([
                'car_id' => $car->id,
                'name' => 'media/sale_car_imgs/' . $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/sale_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        Session::flash('success', __('messages.car_added_suc'));
        return redirect()->route('yalla-index');
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $slug)
    {
        $temporaryImages = TemporaryFile::all();
        $car = SaleCar::getByTranslatedSlug($slug)->first();
        $selectedFeatures = $request->input('features', []);
        $featuresJson = json_encode($selectedFeatures);
        // Make sure of car existence
        if (!$car) {
            return redirect()->back()->withErrors(['Car not found.']);
        }
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'brand' => 'required|exists:car_brands,id',
            'model' => 'required|exists:car_brand_models,id',
            'year' => 'required',
            'color' => 'required',
            'condition' => 'required',
            'payment' => 'required',
            'price' => 'required',
            'description' => 'required|string|max:4200',
            'bodyShape' => 'required',
            'transmission' => 'required',
            'fuelType' => 'required',
            'cc' => 'required',
            'features' => 'required',
            'aspiration' => 'required',
            'km' => 'required',
            'governorate' => 'required',
            'user_name' => 'required',
            'phone' => 'required',
            'main_img' => 'required', // Ensure main_img is present
        ]);
        // Check the Validation
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/sale_car_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Update the car
        $car->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            'condition' => $request->input('condition'),
            'payment' => $request->input('payment'),
            'price' => str_replace(',', '', $request->input('price')),
            'description' => $request->input('description'),
            'bodyShape' => $request->input('bodyShape'),
            'transmission' => $request->input('transmission'),
            'fuelType' => $request->input('fuelType'),
            'cc' => $request->input('cc'),
            'features' => $featuresJson,
            'aspiration' => $request->input('aspiration'),
            'km' => $request->input('km'),
            'governorate' => $request->input('governorate'),
            'user_name' => $request->input('user_name'),
            'phone' => $request->input('phone'),
            'status' => 'pending',
        ]);
        // Deleted removed images and leave only stayed images into the update request
        if ($request->has('images')) {
            // Get the list of image names from the request
            $requestedImageNames = collect($request->images)->pluck('name')->toArray();

            // Find the existing images associated with the stock car
            $existingImages = $car->images;

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
            $car->images()->whereIn('id', $imagesToRemove)->delete();

            // Update the names of the existing images
            foreach ($request->images as $imageData) {
                $imageName = $imageData['name'];
                $car->images()->where('name', $imageName)->update(['name' => $imageName]);
            }

            // If no new main image is selected, retain the existing main image
            if ($mainImageId) {
                $car->images()->where('id', $mainImageId)->update(['main_img' => '1']);
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
            $car->images()->where('id', '!=', $newMainImageId)->update(['main_img' => '0']);

            // Set the new main_img value to 1 for the image with the new main image ID
            $car->images()->where('id', $newMainImageId)->update(['main_img' => '1']);

        }
        // Store new images
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/sale_car_imgs/' . $temporaryImage->name,
                'media/sale_car_imgs/' . $temporaryImage->name);

            // Skip setting the main_img value if it's explicitly provided in the request
            if (!$request->has('main_img')) {
                $mainImageId = $temporaryImage->id; // Assuming $temporaryImage->id is the ID of the newly added image
            }

            SaleCarImages::create([
                'car_id' => $car->id,
                'name' => 'media/sale_car_imgs/' . $temporaryImage->name,
                'main_img' => "0",
            ]);

            Storage::delete('filepond-tmp/sale_car_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        Session::flash('success', 'Updated Successfully');
        return redirect()->route('yalla-index');

    }
    // -------------------- Method -------------------- //
    public function live()
    {
        $cars = SaleCar::where('status', 'approved')->latest()->get();

        // Fetch the names corresponding to the IDs
        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');
        $conditions = SaleCondition::whereIn('id', $cars->pluck('condition'))->pluck('name', 'id');

        // Pass the data to the view
        return view('gt-manager.pages.sale_cars.live',
            compact('cars', 'conditions', 'brands', 'models', 'transmissions', 'kms', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function pending()
    {
        $cars = SaleCar::where('status', 'pending')->latest()->get();
        $images = [];

        foreach ($cars as $car) {
            // Retrieve images for the car if they exist
            $carImages = $car->images ?? [];

            // If there are images for this car, add them to the $images array
            if ($carImages->isNotEmpty()) {
                $images[] = $carImages->firstWhere('main_img', 1);
            }
        }

        $brands = CarBrand::whereIn('id', $cars->pluck('brand'))->pluck('name', 'id');
        $models = CarBrandModel::whereIn('id', $cars->pluck('model'))->pluck('name', 'id');
        $transmissions = TransmissionType::whereIn('id', $cars->pluck('transmission'))->pluck('name', 'id');
        $kms = EngineKm::whereIn('id', $cars->pluck('km'))->pluck('name', 'id');
        $conditions = SaleCondition::whereIn('id', $cars->pluck('condition'))->pluck('name', 'id');
        $governorates = Governorate::whereIn('id', $cars->pluck('governorate'))->pluck('name', 'id');

        return view('gt-manager.pages.sale_cars.pending',
            compact('cars', 'images', 'brands', 'models', 'conditions', 'transmissions', 'kms', 'governorates'));
    }
    // -------------------- Method -------------------- //
    public function approve($slug)
    {
        $car = SaleCar::getByTranslatedSlug($slug)->first();
        $car->update(['status' => 'approved']);
        Session::flash('success', 'Approved Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function decline($slug)
    {
        $car = SaleCar::getByTranslatedSlug($slug)->first();

        $car->update(['status' => 'declined']);
        Session::flash('success', 'Declined Successfully');
        return redirect()->back();
    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $car = SaleCar::getByTranslatedSlug($slug)->first();
        $car->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('sale-car.live');
    }
    // -------------------- YALLA GT / Create -------------------- //
    public function gtCreate()
    {
        $brands = CarBrand::orderBy('name')->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $shapes = BodyShape::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $trans_types = TransmissionType::orderBy('name')->get();
        $FuelTypes = FuelType::orderBy('name')->get();
        $EngineAspirations = EngineAspiration::orderBy('name')->get();
        $EngineKMS = EngineKm::orderBy('name')->get();
        $engineCCS = EngineCc::orderBy('name')->get();
        $governorates = Governorate::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $conditions = SaleCondition::orderBy('name')->get();
        $paymentMethods = PaymentMethods::orderBy('name')->whereIn('id', [1, 4])->get();

        return view('yalla-gt.pages.sale_cars.create',
            compact('brands', 'models',
                'conditions', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'paymentMethods', 'governorates'));
    }
    // -------------------- YALLA GT / Edit -------------------- //
    public function gtEdit($slug)
    {

        $car = SaleCar::getByTranslatedSlug($slug)->first();

        // dd($car);
        $brands = CarBrand::orderBy('name')->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $shapes = BodyShape::orderBy('name')->get();
        $colors = Color::orderBy('name')->get();
        $trans_types = TransmissionType::orderBy('name')->get();
        $FuelTypes = FuelType::orderBy('name')->get();
        $EngineAspirations = EngineAspiration::orderBy('name')->get();
        $EngineKMS = EngineKm::orderBy('name')->get();
        $engineCCS = EngineCc::orderBy('name')->get();
        $governorates = Governorate::orderBy('name')->get();
        $features = Feature::orderBy('name')->get();
        $conditions = SaleCondition::orderBy('name')->get();
        $paymentMethods = PaymentMethods::orderBy('name')->whereIn('id', [1, 4])->get();


        return view('yalla-gt.pages.sale_cars.edit',
            compact('car', 'brands', 'models', 'trans_types', 'shapes', 'EngineAspirations', 'FuelTypes', 'colors', 'engineCCS', 'EngineKMS', 'features', 'governorates',
            'conditions', 'paymentMethods'
        ));
    }
    // -------------------- YALLA GT / Show -------------------- //
    public function gtIndex()
    {
        $brandsWithSaleCars = CarBrand::whereHas('models.saleCars', function ($query) {
            $query->where('status', 'approved');
        })->get(['id', 'name', 'slug', 'logo']);
        return view('yalla-gt.pages.sale_cars.index', compact('brandsWithSaleCars'));

    }
    // -------------------- YALLA GT / Show -------------------- //
    public function gtList($slug)
    {
        // Get brand data by translated slug
        $brandData = CarBrand::getByTranslatedSlug($slug)->first();

        // Get brand models with sale cars
        $brandModels = CarBrandModel::where('car_brand_id', $brandData->id)
        ->whereHas('saleCars', function ($query) {
            $query->where('status', 'approved');
        })
        ->with(['saleCars' => function ($query) {
            $query->where('status', 'approved');
        }])
        ->get();

        // Collect all transmission IDs from the sale cars
        $transmissionIds = $brandModels->flatMap(function ($model) {
            return $model->saleCars->pluck('transmission');
        })->unique();

        // Fetch transmission types based on collected IDs
        $transmissions = TransmissionType::whereIn('id', $transmissionIds)
            ->pluck('name', 'id');

        // Collect all km IDs from the sale cars
        $kmIds = $brandModels->flatMap(function ($model) {
            return $model->saleCars->pluck('km');
        })->unique();

        // Fetch EngineKm values based on collected IDs
        $engineKms = EngineKm::whereIn('id', $kmIds)->pluck('name', 'id');

        // Collect all governorate IDs from the sale cars
        $governorateIds = $brandModels->flatMap(function ($model) {
            return $model->saleCars->pluck('governorate');
        })->unique();

        // Fetch governorate names based on collected IDs
        $governorates = Governorate::whereIn('id', $governorateIds)->pluck('name', 'id');

        // Collect all condition IDs from the sale cars
        $conditionIds = $brandModels->flatMap(function ($model) {
            return $model->saleCars->pluck('condition');
        })->unique();

        // Fetch SaleCondition names based on collected IDs
        $conditions = SaleCondition::whereIn('id', $conditionIds)->pluck('name', 'id');

        // Pass data to the view
        return view('yalla-gt.pages.sale_cars.list',
            compact('brandData', 'brandModels', 'transmissions', 'engineKms', 'governorates', 'conditions'
            ));
    }
    // -------------------- YALLA GT / Show -------------------- //
    public function gtShow($slug)
    {
        $car = SaleCar::getByTranslatedSlug($slug)->with('images')->first();
        // dd($car->brand);
        // $carImages = SaleCarImages::with('images')->get()->first();
        $brand = CarBrand::Where('id', $car->brand)->get()->first();
        $model = CarBrandModel::Where('id', $car->model)->get()->first();
        $condition = SaleCondition::Where('id', $car->condition)->get()->first();
        $BodyShape = BodyShape::Where('id', $car->bodyShape)->get()->first();
        $color = Color::Where('id', $car->color)->get()->first();
        $transmission = TransmissionType::Where('id', $car->transmission)->get()->first();
        $fuelType = FuelType::Where('id', $car->fuelType)->get()->first();
        $aspiration = EngineAspiration::Where('id', $car->aspiration)->get()->first();
        $km = EngineKm::Where('id', $car->km)->get()->first();
        $cc = EngineCc::Where('id', $car->cc)->get()->first();
        $governorate = Governorate::Where('id', $car->governorate)->get()->first();

        // Ensure $car->features is an array
        $featureIds = is_string($car->features) ? json_decode($car->features, true) : $car->features;

        // Validate that $featureIds is indeed an array and not null
        if (!is_array($featureIds)) {
            throw new \Exception('Invalid feature IDs format');
        }

        // Retrieve all feature records matching these IDs
        $features = Feature::whereIn('id', $featureIds)->get();

        // Debug output to check the retrieved features
        // dd($features);

        return view('yalla-gt.pages.sale_cars.show',
            compact('car', 'brand', 'model', 'condition', 'BodyShape', 'color', 'transmission', 'fuelType', 'aspiration', 'cc',
                'km', 'features', 'governorate'
            ));
    }

}
