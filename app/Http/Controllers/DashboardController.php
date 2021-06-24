<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks();
        return view('dashboard', compact('tasks'));
    }

    public function save(Request $request, Task $task)
    {
        if (auth()->user()->id == $task->user_id){
            if(isset($_POST['save'])) {
                $task->description = $request->description;
                $task->date = $request->date;
                $task->status = $request->status;
                $task->save();
                return redirect('/dashboard'); 
            }   
        }
    	 	
    }
}
