<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('task'));
    }

    public function create()
    {
        return view('tasks.createtask');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',      
            'description' => 'required|string',          
            'is_completed' => 'nullable|boolean',        
        ]);

        Task::create($request->only(['title', 'description', 'is_completed'])); // Use only the fields you want to mass assign

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.update', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',      // Ensure field names match
            'description' => 'required|string',
            'is_completed' => 'nullable|boolean',        // Ensure this matches your model
        ]);

        $task->update($request->only(['title', 'description', 'is_completed'])); // Use only the fields you want to mass assign

        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $tasks)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}