<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class DetailLayout extends Component
{
    public $repair;
    /**
     * Create the component instance.
     */
    public function __construct($repair) {
        $this->repair = $repair;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.detail', [
            'repair' => $this->repair,
        ]);
    }
}