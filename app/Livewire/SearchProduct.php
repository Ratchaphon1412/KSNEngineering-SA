<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\product;
use Livewire\WithPagination;

class SearchProduct extends Component
{
    use WithPagination;
    public $searchproduct = '';
    public $selectedProduct;

    protected $queryString = ['searchproduct'];

    public function render()
    {

        $products = product::paginate(5);


        if ($this->searchproduct) {
            $this->resetPage();
            $products = Product::search($this->searchproduct)->paginate(5);
        }


        return view('livewire.search-product', compact('products'));
    }

    public function selectProduct(Product $product)
    {
        $this->selectedProduct = $product;
        $this->dispatch('selectedProduct', $product);
        $this->searchproduct = '';
    }
}
