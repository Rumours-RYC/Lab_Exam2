<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        h1 { text-align: center; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea, input[type="checkbox"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; box-sizing: border-box; }
        input[type="checkbox"] { width: auto; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Task</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label for="is_completed">Completed:</label>
                <input type="checkbox" id="is_completed" name="is_completed" value="1" {{ old('is_completed', $task->is_completed) ? 'checked' : '' }}>
            </div>

            <button type="submit">Update Task</button>
            <p><a href="{{ route('tasks.index') }}">Back to Task List</a></p>
        </form>
    </div>
</body>
</html>