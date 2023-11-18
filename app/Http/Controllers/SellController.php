<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Repair;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    //



    public function repairView(Request $request)
    {
        return view('seller.repair');
    }

    public function indexRepair()
    {
        $repairs = Repair::all();
        $repairs_select = array();
        foreach ($repairs as $repair) {
            if($repair->task->stage == "Pending"){
                array_push($repairs_select ,$repair);
            }
        }
        $teams = Team::get();

        return view('seller.index', [
            'repairs' => $repairs_select,
            'teams' =>$teams, 
        ]);
    }

    public function detailRepair(Repair $repair)
    {
        $teams = Team::get();
        return view('seller.detail', [
            'repair' => $repair,
            'teams' =>$teams, 
        ]);
    }

    public function updateRepair(Repair $repair, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'description' => ['required', 'string', 'min:4'],
        ]);

        $repair = Repair::find($repair->id);
        $repair->name = $request->get('name');
        $repair->description = $request->get('description');

        if ($request->hasFile('images')) {
            $imagePath = 'uploads/' . $repair->image;
            Storage::disk('public')->delete($imagePath);

            $imageName = $request->images->getClientOriginalName();
            $imageName = now()->format('YmdHis') . '-' . $imageName;
            $imagePath = 'uploads/' . $imageName;

            $path = Storage::disk('public')->put($imagePath, file_get_contents($request->images));
            // $path = Storage::disk('public')->url($path);

            $repair->image = $imageName;
        }
        $repair->save();



        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);
    }
    public function updateRepairShow(Repair $repair)
    {
        return view('seller.update', [
            'repair' => $repair,
            'selectedCompany' => $repair->company
        ]);
    }

    public function showCreateCompany(){
        return view('company');
    }


    public function registerCompany(Request $request){
        $request->validate([
            'name' => ['required',],
            'email' => ['required',],
            'phone' => ['required',],
            'website' => ['required',],
            'address' => ['required',],
        ]);

        $company = new Company();
        $company->name      = $request->name;
        $company->email     = $request->email;
        $company->phone     = $request->phone;
        $company->website   = $request->website;
        $company->address   = $request->address;
        $company->save();

        return redirect()->route('seller.repair.view');

    }

    public function purchaseOrder(Repair $repair, Request $request)
    {
        $request->validate([
            'image' => ['required',],
        ]);

        $repair = Repair::find($repair->id);

        if ($request->hasFile('image')) {
            $imagePath = 'uploads/' . $repair->purchase_order;
            Storage::disk('public')->delete($imagePath);

            $imageName = $request->image->getClientOriginalName();
            $imageName = now()->format('YmdHis') . '-' . $imageName;
            $imagePath = 'uploads/' . $imageName;

            $path = Storage::disk('public')->put($imagePath, file_get_contents($request->image));
            // $path = Storage::disk('public')->url($path);

            $repair->purchase_order = $imageName;
        }
        $repair->save();

        $task = $repair->task;
        $task->stage = 'InProcess';
        $task->save();

        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);
    }

    public function addAmount(Request $request, Repair $repair) {
        $repair = Repair::find($repair->id);
        $repair->amount = $request->amount;
        $repair->save();
        return redirect()->route('detail.repair.view', [
            'repair' => $repair,
        ]);

    }

    public function inProcessRepair(){

        $repairs = Repair::get();
        $showRepairs = [];
        foreach ($repairs as $repair) {
            if($repair->task->stage == "InProcess"){
                $showRepairs[] = $repair;
            }
        }

        return view('seller.index', [
            'repairs' => $showRepairs,
        ]);
    }

}
