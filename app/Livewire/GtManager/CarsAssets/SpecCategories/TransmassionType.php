<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Models\TransmissionType as table;
use App\Traits\SlugTrait;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;

class TransmassionType extends Component
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
        $trans_types = table::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.transmassion-type', compact('trans_types'));
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
        $validatedData = $this->validate((new StoreRequest('transmission_types'))->rules());
        // Store data...
        table::create([
            'name' => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/trans_type', 'public') : null,
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
        $trans_types = table::findOrFail($id);
        $this->logo = $trans_types ? $trans_types->logo : null;
        $this->name_en = $trans_types ? $trans_types->getTranslations('name')['en'] : '';
        $this->name_ar = $trans_types ? $trans_types->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }
    // -------------------- update -------------------- //
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'transmission_types'))->rules());
        $trans_types = table::findOrFail($id);

        $trans_types->update([
            "name" => ['en' => $validatedData['name_en'] ?? $trans_types->name->en, 'ar' => $validatedData['name_ar'] ?? $trans_types->name->ar],
            "slug" => $this->slug(['en' => $validatedData['name_en'] ?? $trans_types->name->en, 'ar' => $validatedData['name_ar'] ?? $trans_types->name->ar]),
            "logo" => $this->logo instanceof \Illuminate\Http\UploadedFile  ?
            $this->logo->store('media/spec_category_imgs/trans_type', 'public') :
            $trans_types->logo,
        ]);

        $this->reset(['name_en', 'name_ar', 'newLogo']);

        $this->resetFields();

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
