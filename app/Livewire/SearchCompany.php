<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;


use Livewire\WithPagination;



class SearchCompany extends Component
{
    use WithPagination;

    public $search;
    public $seleted;
    public $toggle;
    protected $queryString = ['search'];







    public function render()
    {
        $items = Company::paginate(5);

        $selectedCompany = null;






        if ($this->search) {
            $this->resetPage();
            $items = Company::search($this->search)->paginate(5);
        }

        if ($this->seleted) {
            $selectedCompany = Company::find($this->seleted);
            // $this->company_id = $selectedCompany->id;
            $this->dispatch('companySelected', $selectedCompany->id);
        }






        return view('livewire.search-company', ['items' => $items, 'selectedCompany' => $selectedCompany, 'toggle' => $this->toggle]);
    }



    public function selectItem(String $company)
    {

        $this->seleted = $company;
        $this->search = '';
    }
}
