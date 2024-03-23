<?php

namespace App\View\Components\model;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class delete extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $id)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.model.delete');
    }
}
