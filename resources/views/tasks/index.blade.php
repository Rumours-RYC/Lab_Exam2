<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        .actions a, .actions form { display: inline-block; margin-right: 5px; }
        .success { color: green; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Task List</h1>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <p><a href="{{ route('tasks.create') }}">Create New Task</a></p>

        @if ($task->isEmpty())
            <p>No tasks yet. <a href="{{ route('tasks.create') }}">Create one!</a></p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($task as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->is_completed ? 'Completed' : 'Pending' }}</td>
                            <td class="actions">
                                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>