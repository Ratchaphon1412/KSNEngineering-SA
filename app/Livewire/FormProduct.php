<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\product;
use App\Models\productImage;

class FormProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $amount;
    public $description;
    public $images;

    public function render()
    {
        return view('livewire.form-product');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = new product();
        $product->name = $this->name;
        $product->price = $this->price;
        $product->amount = $this->amount;
        $product->description = $this->description;
        $product->post_image = $this->images[0]->hashName();
        $product->save();

        foreach($this->images as $image){
            $image->store('public/product');
            $productImage = new productImage();
            $productImage->product_id = $product->id;
            $productImage->type = 'image';
            $productImage->imageUrl = $image->hashName();
            $productImage->save();
        }

    }
}
