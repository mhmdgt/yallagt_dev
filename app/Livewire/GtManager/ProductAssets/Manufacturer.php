<?php

namespace App\Livewire\GtManager\ProductAssets;

use Livewire\Component;
use App\Traits\SlugTrait;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Manufacturer as manufact;
use App\Http\Requests\GtManager\Manufacturer\StoreRequest;
use App\Http\Requests\GtManager\Manufacturer\UpdateRequest;

class Manufacturer extends Component
{
    use WithFileUploads, WithPagination, SlugTrait;

    public $name_en;
    public $name_ar;
    public $logo;
    public $newLogo;
    public $delete_id;

    // -------------------- Render -------------------- //
    public function render()
    {
        $manufacturers = manufact::latest()->paginate(50, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.product-assets.manufacturer', compact('manufacturers'));
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
    // -------------------- store -------------------- //
    public function store()
    {
        $validatedData = $this->validate((new StoreRequest('manufacturers'))->rules());
        // Store data...
        manufact::create([
            'name' => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/manufacturer_logos', 'public') : null,
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
        $manufacturer = manufact::findOrFail($id);
        $this->logo = $manufacturer ? $manufacturer->logo : null;
        $this->name_en = $manufacturer ? $manufacturer->getTranslations('name')['en'] : '';
        $this->name_ar = $manufacturer ? $manufacturer->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }
    // -------------------- update -------------------- //
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest( $id , 'manufacturers' ))->rules());
        $manufacturer = manufact::findOrFail($id);

        $manufacturer->update([
            "name" => ['en' => $validatedData['name_en'] ?? $manufacturer->name->en, 'ar' => $validatedData['name_ar'] ?? $manufacturer->name->ar],
            "slug" => $this->slug(['en' => $validatedData['name_en'] ?? $manufacturer->name->en, 'ar' => $validatedData['name_ar'] ?? $manufacturer->name->ar]),
            "logo" => $this->logo instanceof \Illuminate\Http\UploadedFile ?
            $this->logo->store('media/manufacturer_logos', 'public') :
            $manufacturer->logo,
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
        manufact::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'Deleted successfully'

        );
    }
}
