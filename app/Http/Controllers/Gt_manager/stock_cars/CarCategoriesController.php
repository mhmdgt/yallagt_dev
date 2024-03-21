<?php

namespace App\Http\Controllers\Gt_manager\Stock_cars;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FuelType;
use App\Models\BodyShape;

use App\Traits\GetModelTrait;
use App\Models\CarStockCategory;
use App\Models\EngineAspiration;
use App\Models\TransmissionType;

use App\Http\Requests\GtManager\CarStockCategory\StoreCarStockCategoryRequest;
use App\Http\Requests\GtManager\CarStockCategory\UpdateCarStockCategoryRequest;

class CarCategoriesController extends Controller
{

    use GetModelTrait;

        function create()
        {
            $bodyShapes = $this->getModel(BodyShape::class, ['id', 'name']);
            $fuelTypes = $this->getModel(FuelType::class, ['id', 'name']);
            $enginAspiration = $this->getModel(EngineAspiration::class, ['id', 'name']);
            $transmissionType = $this->getModel(TransmissionType::class, ['id', 'name']);
            return view('gt-manager.stock_cars.stock_car_categories.create',compact('bodyShapes','fuelTypes','enginAspiration','transmissionType'));
        }

        function store(StoreCarStockCategoryRequest $request)
        {
            $validatedData = $request->validated();
            $carStockCategory = CarStockCategory::create($validatedData);
            toast('car stock category created successfully ', 'success');
            return redirect(to_route("car-stock-category.index"));
        }

         function edit(CarStockCategory $carStockCategory){
            $bodyShapes = $this->getModel(BodyShape::class, ['id', 'name']);
            $fuelTypes = $this->getModel(FuelType::class, ['id', 'name']);
            $enginAspirations = $this->getModel(EngineAspiration::class, ['id', 'name']);
            $transmissionTypes = $this->getModel(TransmissionType::class, ['id', 'name']);
            return view('',compact('carStockCategory','bodyShapes','fuelTypes','enginAspirations','transmissionTypes'));
         }
        function update(UpdateCarStockCategoryRequest $request,CarStockCategory $carStockCategory){
            $validatedData = $request->validated();
            $carStockCategory->update($validatedData);
            toast('car stock category updated successfully ', 'success');
            return redirect()->back();
        }

        function destroy(CarStockCategory $carStockCategory){
            $carStockCategory->delete();
            toast('car stock category deleted successfully','success');
            return redirect()->back();
        }


}
