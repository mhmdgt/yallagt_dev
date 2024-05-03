<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Models\EngineCc;
use App\Models\FuelType;
use App\Models\StockCar;
use App\Models\BodyShape;
use Illuminate\Support\Str;
use App\Models\CarBrandModel;
use App\Traits\GetModelTrait;
use App\Models\EngineAspiration;
use App\Models\StockCarCategory;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\StockCarCategory\StoreRequest;
use App\Http\Requests\GtManager\StockCarCategory\UpdateRequest;

class StockCarCategoryController extends Controller
{
    use GetModelTrait;

    // -------------------- create -------------------- //
    public function create()
    {
        $stock_car_id = request()->stock_car_id;
        $stockCar = StockCar::find($stock_car_id);
        $model = CarBrandModel::with('brand')->find($stockCar->car_brand_model_id);
        $brand = $model->brand;

        $bodyShapes = $this->getModel(BodyShape::class, ['id', 'name']);
        $fuelTypes = $this->getModel(FuelType::class, ['id', 'name']);
        $enginAspirations = $this->getModel(EngineAspiration::class, ['id', 'name']);
        $transmissionTypes = $this->getModel(TransmissionType::class, ['id', 'name']);
        $engineCapacities = $this->getModel(EngineCc::class, ['id', 'name']);

        return view(
            'gt-manager.pages.stock_cars.stock_car_categories.create',
            compact('stock_car_id', 'bodyShapes', 'fuelTypes', 'enginAspirations', 'transmissionTypes', 'engineCapacities', 'model', 'brand')
        );
    }
    // -------------------- store -------------------- //
    public function store(StoreRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $validatedData['stock_car_id'] = ($request->stock_car_id);

        // dd($validatedData);

        StockCarCategory::create($validatedData);

        $stockCar = StockCar::find($request->stock_car_id);
        $BrandModel = CarBrandModel::with('brand')->find($stockCar->car_brand_model_id);
        $brand = $BrandModel->brand;

        Session::flash('success', 'Category Stored Successfully');
        return redirect()->route('stock-car.show', $brand->slug);
    }
    // -------------------- edit -------------------- //
    public function edit($stockCarCategory)
    {
        $stockCarCategory = StockCarCategory::findOrFail($stockCarCategory);
        $bodyShapes = $this->getModel(BodyShape::class, ['id', 'name']);

        $stockCar = StockCar::find($stockCarCategory->stock_car_id);
        $brandModel = CarBrandModel::with('brand')->find($stockCar->car_brand_model_id);
        $brand = $brandModel->brand;

        $fuelTypes = $this->getModel(FuelType::class, ['id', 'name']);
        $enginAspirations = $this->getModel(EngineAspiration::class, ['id', 'name']);
        $transmissionTypes = $this->getModel(TransmissionType::class, ['id', 'name']);
        $engineCapacities = $this->getModel(EngineCc::class, ['id', 'name']);

        return view(
            'gt-manager.pages.stock_cars.stock_car_categories.edit',
            compact('stockCarCategory', 'bodyShapes', 'fuelTypes', 'enginAspirations', 'transmissionTypes', 'engineCapacities', 'brandModel', 'brand')
        );
    }
    // -------------------- update -------------------- //
    public function update(UpdateRequest $request, $stockCarCategory)
    {
        $stockCarCategory = StockCarCategory::findOrFail($stockCarCategory);
        $validatedData = $request->validated();
        $validatedData['slug'] = Str::slug($validatedData['name']);
        $stockCarCategory->update($validatedData);

        $stockCar = StockCar::find($stockCarCategory->stock_car_id);
        $brandModel = CarBrandModel::with('brand')->find($stockCar->car_brand_model_id);
        $brand = $brandModel->brand;

        Session::flash('success', 'Category Updated Successfully');
        return redirect()->route('stock-car.show', $brand->slug );
    }
    // -------------------- destroy -------------------- //
    function destroy(StockCarCategory $stockCarCategory)
    {
        $stockCar = StockCar::find($stockCarCategory->stock_car_id);
        $stockCarCategory->delete();
        $BrandModel = CarBrandModel::with('brand')->find($stockCar->car_brand_model_id);
        $brand = $BrandModel->brand;

        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('stock-car.show', $brand->slug );
    }
}
