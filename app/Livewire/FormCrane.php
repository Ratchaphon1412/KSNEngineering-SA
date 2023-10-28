<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Crane;
use App\Models\CraneImage;

class FormCrane extends Component
{

    use WithFileUploads;
    //



    public $name;

    public $description;

    public $image;


    public $waranty;
    public $images;

    public function render()
    {
        return view('livewire.form-crane');
    }

    public function save()
    {

        $this->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:1024',

        ]);

        $this->image->store('cranes');

        $crane = Crane::create([
            'company_id' => $this->company_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image->hashName(),
            'waranty' => $this->waranty,
        ]);

        foreach ($this->images as $image) {
            $image->store('cranes');
            $craneImage = new CraneImage();
            $craneImage->crane_id = $crane->id;
            $craneImage->image = $image->hashName();
            $craneImage->save();
        }

        return redirect()->route('dashboard');
    }
}
