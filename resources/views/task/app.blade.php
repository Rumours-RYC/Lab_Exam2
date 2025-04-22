@extends('layouts.app')

@section('content')
    <h2>Delete Task</h2>
    <form action="{{ route('task.delete', $task) }}" method="POST">
        @csrf @method('PUT')
        @include('tasks.form', ['task' => $task])
        <button class="btn btn-danger mt-3">Delete</button>
    </form>
@endsection
