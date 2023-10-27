<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Repair;

use Livewire\WithPagination;
use Livewire\WithFileUploads;


class SearchCompany extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $search;
    public $seleted;
    protected $queryString = ['search'];

    public $title;
    public $details;
    public $company_id;
    public $crane_id;
    public $image;




    public function render()
    {
        $items = Company::paginate(5);

        $selectedCompany = null;





        if ($this->search) {
            $items = Company::search($this->search)->paginate(5);
        }

        if ($this->seleted) {
            $selectedCompany = Company::find($this->seleted);
            $this->company_id = $selectedCompany->id;
        }




        return view('livewire.search-company', ['items' => $items, 'selectedCompany' => $selectedCompany]);
    }



    public function selectItem(String $company)
    {

        $this->seleted = $company;
        $this->search = '';
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


        Repair::create([
            'name' => $this->title,
            'description' => $this->details,
            'company_id' => $this->company_id,
            'user_id' => auth()->user()->id,
            'crane_id' => $this->crane_id,
            'image' => $this->image->hashName(),
        ]);

        return redirect()->route('show.repair.view');
    }
}
