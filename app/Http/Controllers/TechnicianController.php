<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function show(Repair $repair)
    {
        return view('technician.index',[
            'repair' => $repair,
        ]);
    }

    public function update(Request $request)
    {
        return 'eiei';
    }
}
