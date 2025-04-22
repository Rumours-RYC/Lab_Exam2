@extends('layouts.app')

@section('content')
    <h2>Update Task</h2>
    <form action="{{ route('task.update', $task) }}" method="POST">
        @csrf @method('PUT')
        @include('task.form', ['task' => $task])
        <button class="btn btn-primary mt-3">Update</button>
    </form>
@endsection
