@extends('layout')

@section('title', isset($user) ? 'Update ' . $user->name : 'Create User')

@section('content')
    <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back to list</a>

    <form method="POST"
        @if (isset($user)) action="{{ route('users.update', $user) }}"
        @else
    action="{{ route('users.store') }}" @endif
        class="mt-4">
        @csrf

        @if (isset($user))
            @method('PUT')
        @endif

        <div class="row">
            <div class="col">
                <input name="name" value="{{ isset($user) ? $user->name : null }}" type="text" class="form-control"
                    placeholder="name" aria-label="name">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <input name="email" value="{{ isset($user) ? $user->email : null }}" type="text" class="form-control"
                    placeholder="Email" aria-label="email">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <form method="POST" class="mt-3" action="{{ route('users.destroy', $user) }}">
                    @csrf
                    @method('DELETE')
                    <a type="button" class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </form>
@endsection
