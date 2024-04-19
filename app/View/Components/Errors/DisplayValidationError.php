<?php

namespace App\View\Components\Errors;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DisplayValidationError extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $property)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.errors.display-validation-error');
    }
}
