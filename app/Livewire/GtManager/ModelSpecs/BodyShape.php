<?php

namespace App\Livewire\GtManager\ModelSpecs;


use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Models\BodyShape as Body;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class BodyShape extends Component
{
    use WithFileUploads, WithPagination;
    public $logo;
    public $name_en;
    public $name_ar;
    // Add a public property to hold the ID of the clicked item
    public $selectedItemId;

    public function rules()
    {
        return  [
            'name_ar' => [
                'required', 'string', 'max:200',
                Rule::unique('body_shapes', 'name->ar')
            ],
            'name_en' => [
                'required', 'string', 'max:200',
                Rule::unique('body_shapes', 'name->en')
            ],
            'logo' => 'nullable|image|max:1024|mimes:png'
        ];
    }

    public function store()
    {
        $validatedData = $this->validate();

        // Store data...

        Body::create([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('photos', 'public') : null,
        ]);
        // Clear form fields after successful storage
        $this->resetFields();
        // Dispatching a browser event after storing the date
        $this->dispatch('dispatch-model')->self();
    }

    function edit($id)
    {
        $bodyShape = Body::findOrFail($id);
        $this->logo = $bodyShape ? $bodyShape->logo : null;
        $this->name_en = $bodyShape ? $bodyShape->getTranslations('name')['en'] : '';
        $this->name_ar = $bodyShape ? $bodyShape->getTranslations('name')['ar'] : '';
    }
    // Add a method to set the data of the clicked item to public properties


    function update($id)
    {
        $validatedData = $this->validate();
        $bodyShape = Body::findOrFail($id);
        // Store data...
        $bodyShape->update([
            "name" => ['en' => $validatedData['name_en'], 'ar' => $validatedData['name_ar']],
            'logo' => $this->logo ? $this->logo->store('photos', 'public') :  $bodyShape->logo,
        ]);
        // Clear form fields after successful storage
        $this->reset(['name_en', 'name_ar', 'logo']);
        // Clear form fields after successful storage
        $this->resetFields();
        // Dispatching a browser event after storing the date
        $this->dispatch('dispatch-model')->self();
    }

    function delete($id)
    {
         Body::findOrFail($id)->delete();
    }
    public function render()
    {

        $bodyShapes = Body::latest()->paginate(10, ['name', 'logo', 'id']);
        return view('livewire.gt-manager.model-specs.body-shape', compact('bodyShapes'));
    }
    private function resetFields()
    {
        $this->reset(['name_en', 'name_ar', 'logo']);
    }
}
