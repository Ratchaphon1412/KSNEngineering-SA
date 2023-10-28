<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class SellController extends Controller
{
    //



    public function repairView(Request $request)
    {
        return view('seller.repair');
    }

    public function indexRepair()
    {
        $repairs = Repair::get();
        $showRepairs = [];
        foreach ($repairs as $repair) {
            if($repair->task->user_id === null){
                $showRepairs[] = $repair;
            }
        }

        return view('seller.index', [
            'repairs' => $showRepairs,
        ]);
    }

    public function detailRepair(Repair $repair)
    {
        return view('seller.detail', [
            'repair' => $repair,
        ]);
    }

    public function updateRepair(Repair $repair)
    {
        return view('seller.update',[
            'repair' => $repair,
        ]);
    }

}
