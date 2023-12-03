<?php

namespace App\Http\Controllers;

use App\Models\Crane;
use App\Models\Image;
use App\Models\Repair;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;


class TechnicianController extends Controller
{
    public function show(Repair $repair)
    {
        return view('technician.index',[
            'task' => $repair->task()->get()[0],
            'repair' => $repair
        ]);
    }

    
    public function doneRepair(Repair $repair)
    {
        if($repair->crane_id){
            $task = $repair->task;
            $task->stage = 'Done';
            $task->save();

            $crane = Crane::find($repair->crane_id);
            $warrantyExpiration = date('Y-m-d', strtotime('+2 years'));
            $crane->waranty = $warrantyExpiration;
            $crane->save();
        }
        else{
            return redirect()->route('product.crane.create', ['repair' => $repair, ]);
        }

        return redirect()->route('show.repair.view');
    }
    public function finishRepair(Repair $repair)
    {
        $task = $repair->task;
        $task->stage = 'FinishRepair';
        $task->save();

        return redirect()->route('repair.mywork', ['user'=>Auth::user() ]);
    }

    public function deleteRepair(Repair $repair)
    {
        $repair->task->delete();
        $repair->delete();

        return redirect()->route('show.repair.view');
    }

    public function update(Request $request, Task $task)
    {
        // var_dump($request->all());
        $request->validate([
            'description' => ['required', 'string', 'min:4'],
            'todo_date' => ['required', 'date'],
        ]);

        // update Event
        $task = Task::find($task->id);
        $task->description = $request->get('description');
        $task->user_id = Auth()->user()->id;
        $task->todo_date = $request->get('todo_date');

        if ($request->hasFile('images')){
            foreach ($task->images as $image) {
                $imagePath = 'uploads/' . $image->name;
                Storage::disk('public')->delete($imagePath);
                $task->images()->delete();
            }
            foreach ($request->images as $image) {
                $imageName = $image->getClientOriginalName();
                $imageName = now()->format('YmdHis') . '-' . $imageName;
                $imagePath = 'uploads/' . $imageName;

                $path = Storage::disk('public')->put($imagePath, file_get_contents($image));
                // $path = Storage::disk('public')->url($path);

                $image = new Image();
                $image->path = $imageName;
                $task->images()->save($image);
            }
        }

        $task->save();

        return redirect()->route('detail.repair.view',[
            'repair' => $task->repair()->get()[0],
        ]);
    }

    public function myWorkTech(User $user)
    {
        $repairs = Repair::all();
        $repairs_select = array();
        foreach ($repairs as $repair) {
            if($repair->task->team == $user->team && $repair->task->stage == "Pending"){
                array_push($repairs_select ,$repair);
            }
        }


        return view('seller.index', [
            'repairs' => $repairs_select,
        ]);
    }

    public function myWorkInProcessTech(User $user)
    {
        $repairs = Repair::all();
        $repairs_select = array();
        foreach ($repairs as $repair) {
            if($repair->task->team == $user->team && $repair->task->stage == "InProcess"){
                array_push($repairs_select ,$repair);
            }
        }


        return view('seller.index', [
            'repairs' => $repairs_select,
        ]);
    }



}
