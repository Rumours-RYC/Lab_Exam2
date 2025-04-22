<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        h1 { text-align: center; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create New Task</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>

            <button type="submit">Create Task</button>
            <p><a href="{{ route('tasks.index') }}">Back to Task List</a></p>
        </form>
    </div>
</body>
</html>