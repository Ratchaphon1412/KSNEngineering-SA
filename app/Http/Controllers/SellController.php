<?php

namespace App\Http\Controllers;

use App\Models\Repair;
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

    public function updateRepair(Repair $repair, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'description' => ['required', 'string', 'min:4'],
        ]);

        $repair = Repair::find($repair->id);
        $repair->name = $request->get('name');
        $repair->description = $request->get('description');
        
        if ($request->hasFile('images')){
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



        return redirect()->route('detail.repair.view',[
            'repair' => $repair,
        ]);
    }
    public function updateRepairShow(Repair $repair){
        return view('seller.update',[
            'repair' => $repair,
            'selectedCompany' => $repair->company
        ]);
    }

    public function purchaseOrder(Repair $repair,Request $request){
        $request->validate([
            'image' => ['required', ],
        ]);

        $repair = Repair::find($repair->id);

        if ($request->hasFile('image')){
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

        return redirect()->route('detail.repair.view',[
            'repair' => $repair,
        ]);
    }

    

}
