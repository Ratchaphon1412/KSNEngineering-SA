<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


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
            
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        foreach($this->images as $image){
            // $image->hashName()
            $image->store('product');
        }
    }
}
