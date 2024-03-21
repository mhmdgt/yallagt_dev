<?php

namespace App\Http\Requests\GtManager\CarStockCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarStockCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'name' => 'required|max:250|unique:car_stock_categories,name,'.$this->carStockCategory->id,
            'price' => 'required|numeric',
            'rims_size' => 'required|integer',
            'number_of_seat' => 'required|integer',
            'trunk_size' => 'required|integer',
            'fuel_tank_capacity' => 'required|integer',
            'engine_capacity' => 'required|integer',
            'cylinder' => 'required|integer',
            'acceleration' => 'required|integer',
            'maximum_speed' => 'required|integer',
            'newton_meter' => 'required|integer',
            'horsepower' => 'required|integer',
            'transmission_speed' => 'required|integer',
            'fuel_consumption' => 'required|integer',
            'active' => 'required|in:0,1',
            'body_shape_id' => 'required|exists:body_shapes,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'transmission_type_id' => 'required|exists:transmission_types,id',
            'engine_aspiration_id' => 'required|exists:engine_aspirations,id',
            'engine_km_id'=>'required|exists:engine_kms,id',
            'engine_cc_id'=>'required|exists:engine_ccs,id',
        ];
    }
}
