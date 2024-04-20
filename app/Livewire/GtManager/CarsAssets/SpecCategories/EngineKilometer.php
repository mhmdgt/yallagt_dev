<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Models\EngineKm as table;
use App\Traits\SlugTrait;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;

class EngineKilometer extends Component
{
    use WithFileUploads, WithPagination, SlugTrait;

    public $name_en;
    public $name_ar;
    public $logo;
    public $newLogo;
    public $delete_id;

    // -------------------- render -------------------- //
    public function render()
    {
        $kmTypes = table::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.engine-kilometer', compact('kmTypes'));
    }
    // -------------------- clearValidationErrors -------------------- //
    public function clearValidationErrors()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    // -------------------- resetFields -------------------- //
    public function resetFields()
    {
        $this->reset(['name_en', 'name_ar', 'logo']);
        $this->clearValidationErrors();
    }
    // -------------------- resetFields -------------------- //
    public function store()
    {
        $validatedData = $this->validate((new StoreRequest('engine_kms'))->rules());
        // Store data...
        table::create([
            'name' => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/engine_km', 'public') : null,
            'slug' => $this->slug(['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']]),
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
    // -------------------- edit -------------------- //
    public function edit($id)
    {
        $kmTypes = table::findOrFail($id);
        $this->logo = $kmTypes ? $kmTypes->logo : null;
        $this->name_en = $kmTypes ? $kmTypes->getTranslations('name')['en'] : '';
        $this->name_ar = $kmTypes ? $kmTypes->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }
    // -------------------- update -------------------- //
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'engine_kms'))->rules());
        $kmTypes = table::findOrFail($id);

        $kmTypes->update([
            "name" => ['en' => $validatedData['name_en'] ?? $kmTypes->name->en, 'ar' => $validatedData['name_ar'] ?? $kmTypes->name->ar],
            "slug" => $this->slug(['en' => $validatedData['name_en'] ?? $kmTypes->name->en, 'ar' => $validatedData['name_ar'] ?? $kmTypes->name->ar]),
            "logo" => $this->logo instanceof \Illuminate\Http\UploadedFile  ?
            $this->logo->store('media/spec_category_imgs/engine_km', 'public') :
            $kmTypes->logo,
        ]);

        // Clear form fields after successful storage
        $this->reset(['name_en', 'name_ar', 'newLogo']);

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
    // -------------------- delete -------------------- //
    public function delete($id)
    {
        table::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'Deleted successfully'

        );
    }
}
