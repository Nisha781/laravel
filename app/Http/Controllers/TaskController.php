<?php

namespace App\Http\Controllers;

use App\Events\TaskAdded;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::all();
        return view('todo.index', compact('tasks'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'task' => 'required|string|max:255',
        ]);
        $taskName = $request->input('task');
        
        $todo = new Task();
        $todo->tasks = $taskName;
        $todo->save();
        event(new TaskAdded($todo));
        return back()->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();
        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
