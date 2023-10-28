<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    public $name;
    public $price;
    public $status;
    /**
     * Create a new component instance.
     */
    public function __construct($name,$price,$status)
    {
        $this->name = $name;
        $this->price = $price;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
