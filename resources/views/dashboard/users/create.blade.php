@extends('dashboard.master')

@section('title')
    All Users
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>

                    <div class="card-body">
                        <a href="{{ route('users.index') }}" class="btn btn-success">Back</a>

                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf

                            <div>
                                <label>Name:</label>
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>

                            <div>
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>

                            <div>
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message}}</span>
                                @enderror
                            </div>

                            <div class="mt-2">
                                <label>Roles:</label>
                                <select class="form-select" name="roles[]" multiple>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection