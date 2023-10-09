<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name, $type, $label, $placeholder, $value, $class;
    /**
     * Create a new component instance.
     */
    public function __construct($name = "name", $type = "text", $label = "Label", $placeholder = "Name", $value="",$class="")
    {
        $this->name = $name;
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
