@extends('layout')
@section('title', 'User ' . $user->name)

@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to list</a>

    <div class="card mt-3" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Id: {{ $user->id }}</li>
            <li class="list-group-item">Name: {{ $user->name }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Created at: {{ $user->created_at->format('d/m/y H:i:s') }}</li>
            <li class="list-group-item">Updated at: {{ $user->updated_at->format('d/m/y H:i:s') }}</li>
        </ul>
    </div>

    <form method="POST" class="mt-3" action="{{ route('users.destroy', $user) }}">
        @csrf
        @method('DELETE')
        <a type="button" class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>

        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
@endsection
