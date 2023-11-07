<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\product;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Models\Quotation;

class QuotationForm extends Component
{

    public $cart;

    public Quotation $quotation;

    protected $listeners = ['selectedProduct', 'removeItem', 'updateQuantity'];

    public function mount()
    {
        $this->cart = new Collection();


        if ($this->quotation->orderDetails) {
            $this->quotation->orderDetails->each(function ($item) {
                $product = Product::find($item->id);
                $temp = (object) [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'type' => $product->type,
                    'price' => $product->price,
                    'amount' => $product->sub_total,
                    'quantity' => $item->quantity,
                    'post_image' => $product->post_image,
                ];

                $this->cart->push($temp);
                $this->dispatch('updateCart', $this->cart);
            });
        }
    }


    public function render()
    {



        return view('livewire.quotation-form', ['cart' => $this->cart, 'quotation' => $this->quotation]);
    }

    public function selectedProduct(product $product)
    {
        if ($this->cart->contains('id', $product->id)) {

            return;
        }

        $temp = (object) [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'type' => $product->type,
            'price' => $product->price,
            'amount' => $product->amount,
            'quantity' => 1,
            'post_image' => $product->post_image,
        ];






        // Copy other attributes as needed

        $this->cart->push($temp);
        $this->dispatch('updateCart', $this->cart);
    }


    public function removeItem(product $product)
    {
        $this->cart = $this->cart->reject(function ($item) use ($product) {
            return $item->id == $product->id;
        });

        $this->dispatch('updateCart', $this->cart);
    }
    public function updateQuantity(product $product, $quantity)
    {
        $productIndex = $this->cart->search(function ($item) use ($product) {
            return $item->id == $product->id;
        });

        if ($productIndex !== false) {
            $this->cart[$productIndex]->quantity = $quantity;
            $this->dispatch('updateCart', $this->cart);
        }
    }
}
