<?php

namespace App\Livewire;

use App\Models\Crane;
use Livewire\Component;

class CardCrane extends Component
{
    public $crane;

    public function render()
    {
        $craneCard = null;

        if ($this->crane) {
            $craneCard = Crane::find($this->crane)->first();
        }

        return view('livewire.card-crane', ['craneCard' => $craneCard]);
    }
}
