<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Crane;
use App\Models\Company;
use App\Models\CraneImage;

class FormCrane extends Component
{

    use WithFileUploads;
    //


    public $name;
    public $description;
    public $image;
    public $repair;
    // public $company_id;
    // public $waranty;

    public $images;

    protected $listeners = ['companySelected'];

    public function render()
    {

        // $selectedCompany = null;
        // if ($this->company_id) {
        //     $selectedCompany = Company::find($this->company_id);
        // }

        return view('livewire.form-crane');
    }

    public function save()
    {


        $this->validate([

            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|max:2048',

        ]);

        $this->image->store('cranes');

        $crane = Crane::create([
            'company_id' => $this->repair->company_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image->hashName(),
            'waranty' =>  date('Y-m-d', strtotime('+2 years')),
        ]);

        if ($this->images) {
            foreach ($this->images as $image) {
                $image->store('cranes');
                $craneImage = new CraneImage();
                $craneImage->crane_id = $crane->id;
                $craneImage->image = $image->hashName();
                $craneImage->save();
            }
        }

        $task = $this->repair->task;
        $task->stage = 'Done';
        $task->save();


        return redirect()->route('show.repair.view');
    }

    // public function companySelected($company)
    // {
    //     $this->company_id = $company;
    // }
}
