@extends('layouts.app')

@section('content')
    <h2>Create Task</h2>
    <form action="{{ route('task.createtask') }}" method="POST">
        @csrf
        @include('tasks.form')
        <button class="btn btn-success mt-3">Save</button>
    </form>
@endsection
