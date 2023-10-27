<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;
use App\Models\Crane;
use Livewire\WithPagination;


class SearchCompany extends Component
{
    use WithPagination;
    public $search;
    public $seleted;
    protected $queryString = ['search'];





    public function render()
    {
        $items = Company::paginate(5);

        $selectedCompany = null;





        if ($this->search) {
            $items = Company::search($this->search)->paginate(5);
        }

        if ($this->seleted) {
            $selectedCompany = Company::find($this->seleted);
        }



        return view('livewire.search-company', ['items' => $items, 'selectedCompany' => $selectedCompany]);
    }



    public function selectItem(String $company)
    {

        $this->seleted = $company;
        $this->search = '';
    }
}
