<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Task;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function manageTeam(Task $task, Request $request) {
        $task = Task::find($task->id);
        if( $request->selected == 0) {
            $task->team_id = null;
            $task->save();
            return redirect()->back();
        }
        $task->team_id = $request->selected;
        $task->save();

        return redirect()->back();
    }
}
