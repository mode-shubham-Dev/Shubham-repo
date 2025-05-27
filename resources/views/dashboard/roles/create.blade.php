@extends('dashboard.master')

@section('title')
    All Roles
@endsection

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <h3>Create Role</h3>
                        <div class="card-body">
                            <a href="{{ route('roles.index') }}" class="btn btn-success">Back</a>

                            <form action="{{ route('roles.store') }}" method="POST">
                                @csrf

                                <div>
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message}}</span>
                                    @enderror
                                </div>

                                <div class="mt-2">
                                    <h3>Permissions:</h3>
                                    @foreach ($permissions as $permission)
                                        <label><input type="checkbox" name="permissions[{{ $permission->name }}]"
                                                value="{{ $permission->name }}">{{ $permission->name }}</label><br>

                                    @endforeach
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
