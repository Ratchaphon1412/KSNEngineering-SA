<?php

namespace App\Livewire;

use App\Models\product;
use Livewire\Component;

class CardItemsQuotation extends Component
{
    public  $product;
    public $quantity;
    public $total;



    public function mount()
    {



        $this->quantity = 1;
        $this->product->quantity = 1;
        $this->total = $this->product->price;
    }

    public function render()
    {



        return view('livewire.card-items-quotation', ['item' => $this->product, 'quantity' => $this->quantity, 'total' => $this->total]);
    }

    public function increase()
    {
        if ($this->quantity < $this->product->amount) {
            $this->quantity++;
            $this->product->quantity = $this->quantity;
            $this->total = $this->product->price * $this->quantity;
            $this->dispatch('updateQuantity',  $this->product, $this->quantity);
        } else {
            $this->product->quantity = $this->quantity;
            $this->dispatch('updateQuantity',  $this->product, $this->quantity);
        }
    }


    public function decrease()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->product->quantity = $this->quantity;
            $this->total = $this->product->price * $this->quantity;
            $this->dispatch('updateQuantity', $this->product, $this->quantity);
        } else {
            $this->product->quantity = $this->quantity;
            $this->dispatch('updateQuantity',  $this->product, $this->quantity);
        }
    }

    public function removeItem()
    {
        $this->dispatch('removeItem', $this->product->id);
    }
}
