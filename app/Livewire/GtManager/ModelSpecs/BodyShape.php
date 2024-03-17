<?php

namespace App\Livewire\GtManager\ModelSpecs;


use Livewire\Component;
use App\Models\BodyShape as Body;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class BodyShape extends Component
{
    use WithFileUploads;
    public $showModal = false; // Add a property to track modal state
    public $name_en;
    public $name_ar;
    public $logo;
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
        $this->logo->store('photos', 'public'); // Example storage method
        // Clear form fields after successful storage
        $this->reset(['name_en', 'name_ar', 'logo']);

        // Close modal after storing data
        $this->showModal = false;
    }
    function toggleModal()
    {
     $this->showModal = true;
    }

    function update()
    {
        
        $validatedData = $this->validate();

        // Store data...
      
        // Clear form fields after successful storage
        $this->reset(['name_en', 'name_ar', 'logo']);
    }
    public function render()
    {

        $bodyShapes = Body::paginate();
        return view('livewire.gt-manager.model-specs.body-shape', compact('bodyShapes'));
    }
}
