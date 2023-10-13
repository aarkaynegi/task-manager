<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Management App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script src="{{ asset('js/tasks.js') }}"></script>
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto">
            <a href="{{ route('tasks.index') }}" class="text-white mr-4">Task List</a>
            <a href="{{ route('tasks.create') }}" class="text-white">Create Task</a>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4 bg-white shadow-lg rounded-lg">
        @yield('content')
    </div>

</body>
</html>
