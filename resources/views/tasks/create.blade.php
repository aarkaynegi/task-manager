@extends('layouts.app')

@section('content')
    <h1 class="text-2xl mb-4">Create Task</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Task Name:</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="priority" class="block text-gray-700">Priority:</label>
            <input type="number" id="priority" name="priority" class="w-full border border-gray-300 px-3 py-2 rounded focus:outline-none focus:border-blue-500" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Task</button>
    </form>
@endsection
