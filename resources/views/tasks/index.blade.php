@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Task List</h1>

    @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
    @endif

    <ul id="task-list" class="list-disc pl-4">
        @foreach($tasks as $task)
            <li data-task-id="{{ $task->id }}" class="mb-2 bg-white border border-gray-300 p-2 rounded">
                <span class="handle text-gray-600 cursor-move">☰</span>
                {{ $task->name }} <span class="text-gray-600">- Priority: {{ $task->priority }}</span>
                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 ml-2">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded">Create New Task</a>
@endsection
