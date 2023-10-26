<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class SearchCompany extends Component
{
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $items = [];


        if ($this->search) {
            $items = Company::search($this->search)->get();
        }

        return view('livewire.search-company', compact('items'));
    }
}
