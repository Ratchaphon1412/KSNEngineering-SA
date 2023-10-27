<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class SearchProduct extends Component
{
    use WithPagination;
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {

        $products = Product::paginate(5);


        if ($this->search) {
            $products = Product::search($this->search)->paginate(5);
        }


        return view('livewire.search-product', compact('products'));
    }
}
