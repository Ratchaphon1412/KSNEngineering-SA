<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Repair;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TechnicianController extends Controller
{
    public function show(Repair $repair)
    {
        return view('technician.index',[
            'task' => $repair->task()->get()[0],
        ]);
    }

    public function myWork()
    {
        $repairs = Repair::get();
        $showRepairs = [];
        foreach ($repairs as $repair) {
            if($repair->task->user_id === Auth()->user()->id){
                $showRepairs[] = $repair;
            }
        }

        return view('technician.myWork', [
            'repairs' => $showRepairs,
        ]);
    }

    public function update(Request $request, Task $task)
    {
        // var_dump($request->all());
        $request->validate([
            'description' => ['required', 'string', 'min:4'],
        ]);

        // update Event
        $task = Task::find($task->id);
        $task->description = $request->get('description');
        $task->user_id = Auth()->user()->id;

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




}
