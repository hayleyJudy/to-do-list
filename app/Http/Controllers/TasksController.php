<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks();
        return view('list', compact('tasks'));
    }
    public function add()
    {
    	return view('add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required'
        ]);
    	$task = new Task();
    	$task->description = $request->description;
        $task->date = $request->date;
        $task->status = $request->status;
        // $task->date = Carbon::createFromFormat('Y-m-d', $myDate)->format('Y-m-d');
    	$task->user_id = auth()->user()->id;
    	$task->save();
    	return redirect('/list'); 
    }

    public function edit(Task $task)
    {

    	if (auth()->user()->id == $task->user_id)
        {            
                return view('edit', compact('task'));
        }           
        else {
             return redirect('/list');
         }            	
    }

    public function update(Request $request, Task $task)
    {
    	if(isset($_POST['delete'])) {
    		$task->delete();
    		return redirect('/list');
    	}
    	else
    	{
            $this->validate($request, [
                'description' => 'required'
            ]);
    		$task->description = $request->description;
            $task->date = $request->date;
            $task->status = $request->status;
	    	$task->save();
	    	return redirect('/list'); 
    	}    	
    }
}