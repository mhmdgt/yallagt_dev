<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;
use App\Models\EngineKm as Type;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EngineKilometer extends Component
{
    use WithFileUploads, WithPagination;

    public $logo;
    public $name_en;
    public $name_ar;
    public $delete_id;

    public function render()
    {
        $types = Type::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.engine-kilometer', compact('types'));
    }
    public function clearValidationErrors()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function resetFields()
    {
        $this->reset(['name_en', 'name_ar', 'logo']);
        $this->clearValidationErrors();
    }
    public function store()
    {
        $validatedData = $this->validate((new StoreRequest('engine_kms'))->rules());
        // Store data...
        Type::create([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/engine_km', 'public') : null,
        ]);
        // Clear form fields after successful storage
        $this->resetFields();
        // Dispatching a browser event after storing the date
        $this->dispatch('hide-modal-dispatch')->self();

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Data Stored',
            position: 'center'
        );
    }
    public function edit($id)
    {
        $EngineKilometer = Type::findOrFail($id);
        $this->logo = $EngineKilometer ? $EngineKilometer->logo : null;
        $this->name_en = $EngineKilometer ? $EngineKilometer->getTranslations('name')['en'] : '';
        $this->name_ar = $EngineKilometer ? $EngineKilometer->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'engine_kms'))->rules());
        $EngineKilometer = Type::findOrFail($id);
        // Store data...
        $EngineKilometer->update([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/engine_km', 'public') : $EngineKilometer->logo,
        ]);
        // Clear form fields after successful storage
        $this->reset(['name_en', 'name_ar', 'logo']);
        // Clear form fields after successful storage
        $this->resetFields();
        // Dispatching a browser event after storing the date

        $this->dispatch('hide-modal-dispatch')->self();

        $this->dispatch(
            'toast',
            type: 'success',
            title: 'updated successfully'
        );
    }
    public function delete($id)
    {

        Type::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'deleted successfully'

        );
    }
}
