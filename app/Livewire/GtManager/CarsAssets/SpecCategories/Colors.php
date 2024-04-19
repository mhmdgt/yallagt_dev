<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;
use App\Models\Colors as color;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Colors extends Component
{
    use WithFileUploads, WithPagination;

    public $name_en;
    public $name_ar;
    public $logo;
    public $delete_id;

    public function render()
    {
        $colors = color::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.colors', compact('colors'));
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
        $validatedData = $this->validate((new StoreRequest('colors'))->rules());
        // Store data...
        color::create([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/colors', 'public') : null,
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
        $color = color::findOrFail($id);
        $this->logo = $color ? $color->logo : null;
        $this->name_en = $color ? $color->getTranslations('name')['en'] : '';
        $this->name_ar = $color ? $color->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'colors'))->rules());
        $color = color::findOrFail($id);
        // Store data...
        $color->update([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/colors', 'public') : $color->logo,
        ]);
        $this->dispatch('success');
       
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
        color::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'deleted successfully'

        );
    }
}
