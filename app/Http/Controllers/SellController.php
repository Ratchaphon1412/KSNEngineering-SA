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
        return view('seller.index', [
            'repairs' =>$repairs,
        ]);
    }

    public function detailRepair(Repair $repair)
    {
        return view('seller.detail',[
            'repair' => $repair,
        ]);
    }
}
