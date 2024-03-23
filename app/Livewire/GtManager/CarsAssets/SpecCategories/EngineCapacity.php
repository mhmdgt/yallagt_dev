<?php

namespace App\Livewire\GtManager\CarsAssets\SpecCategories;

use App\Http\Requests\GtManager\CarSpecCategory\StoreRequest;
use App\Http\Requests\GtManager\CarSpecCategory\UpdateRequest;
use App\Models\EngineCc as Type;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class EngineCapacity extends Component
{
    use WithFileUploads, WithPagination;

    public $logo;
    public $name_en;
    public $name_ar;
    public $delete_id;

    public function render()
    {
        $types = Type::latest()->paginate(20, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.cars-assets.spec-categories.engine-capacity', compact('types'));
    }
    public function resetFields()
    {
        $this->reset(['name_en', 'name_ar', 'logo']);
    }
    public function store()
    {
        $validatedData = $this->validate((new StoreRequest('engine_ccs'))->rules());
        // Store data...
        Type::create([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('photos', 'public') : null,
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
        $EngineCapacity = Type::findOrFail($id);
        $this->logo = $EngineCapacity ? $EngineCapacity->logo : null;
        $this->name_en = $EngineCapacity ? $EngineCapacity->getTranslations('name')['en'] : '';
        $this->name_ar = $EngineCapacity ? $EngineCapacity->getTranslations('name')['ar'] : '';
    }
    public function update($id)
    {
        $validatedData = $this->validate((new UpdateRequest($id, 'body_shapes'))->rules());
        $EngineCapacity = Type::findOrFail($id);
        // Store data...
        $EngineCapacity->update([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('photos', 'public') : $EngineCapacity->logo,
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
