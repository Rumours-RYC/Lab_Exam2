@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Tasks</h2>
        <a href="{{ route('task.createtask') }}" class="btn btn-primary">Create Task</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('task.update', $task) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('task.delete', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No tasks found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection