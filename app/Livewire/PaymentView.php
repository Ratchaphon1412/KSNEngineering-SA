<?php

namespace App\Livewire;

use Livewire\Component;
use OmiseTransaction;
use App\Service\Payments\Omise;




class PaymentView extends Component
{
    public $repair;

    // public function render()
    // {
    //     $transactions = Omise::AllTransection();
    //     $list_transaction = $transactions['list'];


    //     return view('livewire.payment-view', compact('transactions', 'list_transaction'));
    // }
}
