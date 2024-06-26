<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormInput extends Component
{
    public $label;
    public $name;
    public $id;
    public $type;
    public $required;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $id, $type='text',$required=false, $value='')
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->type = $type;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-input');
    }
}
