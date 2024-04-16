<?php

namespace App\Livewire\GtManager\ProductAssets;

use App\Http\Requests\GtManager\Manufacturer\StoreRequest;
use App\Models\Manufacturers as manufact;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Manufacturer extends Component
{
    use WithFileUploads, WithPagination;

    public $name_en;
    public $name_ar;
    public $logo;
    public $delete_id;

    public function delete($id)
    {
        manufact::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'deleted successfully'

        );
    }
    public function store()
    {
        $validatedData = $this->validate((new StoreRequest('manufacturers'))->rules());
        $nameArray = ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']];

        $slugArray = [];
        foreach ($nameArray as $key => $value) {
            $slugArray[$key] = str_replace(' ', '_', strtolower($value)); // Replace spaces with underscores and convert to lowercase
        }

        // Store data...
        manufact::create([
            'name' => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/manufacturer_logos', 'public') : null,
            'slug_ar' => $slugArray['ar'],
            'slug_en' => $slugArray['en'],
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
    public function render()
    {
        $manufacturers = manufact::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.product-assets.manufacturer', compact('manufacturers'));
    }
}
