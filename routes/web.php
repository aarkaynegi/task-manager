<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Create a new task
Route::post('/tasks', function () {
    $task = new Task;
    $task->name = request('name');
    $task->priority = request('priority');
    $task->save();

    return redirect('/tasks');
});

// Edit a task
Route::put('/tasks/{task}', function (Task $task) {
    $task->name = request('name');
    $task->priority = request('priority');
    $task->save();

    return redirect('/tasks');
});

// Delete a task
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect('/tasks');
});

// Reorder tasks with drag and drop
Route::put('/tasks/reorder', function () {
    $tasks = Task::all();

    foreach ($tasks as $task) {
        $task->priority = request('priority-' . $task->id);
        $task->save();
    }

    return redirect('/tasks');
});
