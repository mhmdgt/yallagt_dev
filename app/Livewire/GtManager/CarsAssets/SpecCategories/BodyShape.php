<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;
use App\Models\BodyShape as Body;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BodyShape extends Component
{
    use WithFileUploads, WithPagination;

    public $logo;
    public $name_en;
    public $name_ar;
    public $delete_id;

    public function render()
    {
        $bodyShapes = Body::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.body-shape', compact('bodyShapes'));
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
        $validatedData = $this->validate((new StoreRequest('body_shapes'))->rules());
        // Store data...
        Body::create([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/body_shape', 'public') : null,
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
        $bodyShape = Body::findOrFail($id);
        $this->logo = $bodyShape ? $bodyShape->logo : null;
        $this->name_en = $bodyShape ? $bodyShape->getTranslations('name')['en'] : '';
        $this->name_ar = $bodyShape ? $bodyShape->getTranslations('name')['ar'] : '';
        $this->clearValidationErrors();
    }

    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'body_shapes'))->rules());
        $bodyShape = Body::findOrFail($id);
        // Store data...
        $bodyShape->update([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('media/spec_category_imgs/body_shape', 'public') : $bodyShape->logo,
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

        Body::findOrFail($id)->delete();
        $this->dispatch('hide-modal-dispatch')->self();
        $this->dispatch(
            'toast',
            type: 'success',
            title: 'deleted successfully'

        );
    }
}
