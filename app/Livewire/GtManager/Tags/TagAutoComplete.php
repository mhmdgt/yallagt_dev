<?php

namespace App\Livewire\GtManager\Tags;

use App\Models\Tag;
use Livewire\Component;

class TagAutoComplete extends Component
{
    public $tags = [];

    public function updatedTags($value)
    {
        // Do something with the selected tags, if needed
    }

    public function render()
    {
        // Fetch existing tags from the database
        $tags = Tag::pluck('name')->toArray();

        return view('livewire.gt-manager.tags.tag-auto-complete', ['tags' => $tags]);
    }

    // public function render()
    // {
       

    //     return view('livewire.gt-manager.tags.tag-auto-complete');
    // }
}
