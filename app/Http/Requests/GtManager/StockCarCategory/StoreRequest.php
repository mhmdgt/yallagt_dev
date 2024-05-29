<?php

namespace App\Http\Requests\GtManager\StockCarCategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:250|unique:stock_car_categories,name',
            'price' => 'required',
            'status' => 'in:hidden,active',
            'rims_size' => 'nullable|integer',
            'number_of_seat' => 'required|integer',
            'trunk_size' => 'nullable|integer',
            'fuel_tank_capacity' => 'nullable|integer',
            'cylinder' => 'required|integer',
            'acceleration' => 'nullable|integer',
            'maximum_speed' => 'nullable|integer',
            'newton_meter' => 'required|integer',
            'horsepower' => 'required|integer',
            'transmission_speed' => 'required|integer',
            'fuel_consumption' => 'nullable|integer',
            'body_shape_id' => 'required|exists:body_shapes,id',
            'fuel_type_id' => 'required|exists:fuel_types,id',
            'transmission_type_id' => 'required|exists:transmission_types,id',
            'engine_aspiration_id' => 'required|exists:engine_aspirations,id',
            'engine_cc_id' => 'required|exists:engine_ccs,id',
        ];
    }
}
