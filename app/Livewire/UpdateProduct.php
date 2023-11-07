<?php

namespace App\Livewire;

use App\Models\product;
use App\Models\productImage;
use App\Models\User;
use Livewire\WithFileUploads;
use Livewire\Component;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public $product;

    public $name;
    public $price;
    public $amount;
    public $description;
    public $images;
    public $post_image;
    public $route;

    public function mount(product $product){
        $this->product = $product;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->amount = $product->amount;
        $this->description = $product->description;
        $this->post_image = $product->post_image;
        $this->route = url()->previous();
    }

    public function render()
    {
        return view('livewire.update-product')->layout('layouts.app');
    }
    
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'description' => 'required|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $product = product::find($this->product->id)->update([
            'name' => $this->name,
            'price' => $this->price,
            'amount' => $this->amount,
            'description' => $this->description,
            'post_image' => $this->images[0]->hashName()
        ]);

        foreach($this->product->image()->get() as $image){
            $image->delete();
        }
        
        foreach($this->images as $image){
            $image->store('public/product');
            $productImage = new productImage();
            $productImage->product_id = $this->product->id;
            $productImage->type = 'image';
            $productImage->imageUrl = $image->hashName();
            $productImage->save();
        }

        return redirect($this->route);        
    }
}
