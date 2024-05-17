<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GroupInput extends Component
{
    public $label;
    public $name;
    public $id;
    public $groupText;
    public $required;
    public $value;
    /**
     * Create a new component instance.
     */
    public function __construct($label, $name, $id, $groupText, $required=false, $value='')
    {
        $this->label = $label;
        $this->name = $name;
        $this->id = $id;
        $this->groupText = $groupText;
        $this->required = $required;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.group-input');
    }
}
