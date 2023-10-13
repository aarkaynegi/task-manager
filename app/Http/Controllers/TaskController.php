<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        $tasks = Task::orderBy('priority')->get();

        return view('tasks.index', compact('tasks'));
    }

    public function getTasks()
    {

        $lastUpdated = Carbon::createFromTimestamp(date("Y-m-d", time()));

        $tasks = Task::where('updated_at', '>', $lastUpdated)->get();
        $tasks = Task::orderBy('priority')->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer|min:1',
        ]);

        $existingTask = Task::where('priority', $request->priority)->first();

        if ($existingTask) {
            $newPriority = Task::max('priority') + 1;
            $request->merge(['priority' => $newPriority]);

            session()->flash('message', 'A task with the same priority already exists. Task created with a new priority.');
        }

        Task::create([
            'name' => $request->name,
            'priority' => $request->priority,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->name = $request->name;
        $task->priority = $request->priority;

        $task->save();

        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect('/tasks');
    }

    public function updatePriorities(Request $request)
    {
        $taskIds = $request->input('taskIds');

        foreach ($taskIds as $index => $taskId) {
            Task::where('id', $taskId)->update(['priority' => $index + 1]);
        }

        return response()->json(['message' => 'Priorities updated successfully']);
    }

}
