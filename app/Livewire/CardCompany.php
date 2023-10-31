<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company;

class CardCompany extends Component
{
    public $company;

    // public function mount($company)
    // {
    //     $this->company = $company;
    // }

    protected $listeners = ['companySelected'];


    public function render()
    {
        $companyCard = null;
        if ($this->company) {
            $companyCard = Company::find($this->company->id)->first();
        }


        return view('livewire.card-company', [
            'company' => $companyCard
        ]);
    }

    public function updatedCompany(Company $company)
    {
        $this->company = $company;
    }

    public function companySelected(Company $company)
    {

        $this->company = $company;
    }
}
