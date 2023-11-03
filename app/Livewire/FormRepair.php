<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Repair;
use App\Models\Task;
use App\Models\Quotation;
use App\Models\Company;
use Livewire\WithFileUploads;


class FormRepair extends Component
{
    use WithFileUploads;
    public $title;
    public $details;
    public $company_id;
    public $crane_id;
    public $image;

    protected $listeners = ['companySelected'];

    public function render()
    {
        $selectedCompany = null;

        if ($this->company_id) {
            $selectedCompany = Company::find($this->company_id);
        }

        return view('livewire.form-repair', compact('selectedCompany'));
    }

    public function save()
    {


        $this->validate([
            'title' => 'required',
            'details' => 'required',
            'company_id' => 'required',
            // 'crane_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        // $imageName = time() . '.' . $this->image->extension();

        $this->image->store('repairs');


        $repair = Repair::create([
            'name' => $this->title,
            'description' => $this->details,
            'company_id' => $this->company_id,
            'user_id' => auth()->user()->id,
            'crane_id' => $this->crane_id,
            'image' => $this->image->hashName(),
        ]);

        $task = Task::create([
            'repair_id' => $repair->id,
            'user_id' => auth()->user()->id,

        ]);

        Quotation::create([
            'repair_id' => $repair->id,
            'user_id' => auth()->user()->id,
            'task_id' => $task->id,
            'company_id' => $this->company_id,
            'total' => 0,
            'grand_total' => 0,

        ]);





        return redirect()->route('show.repair.view');
    }

    public function companySelected($company)
    {
        $this->company_id = $company;
    }
}
