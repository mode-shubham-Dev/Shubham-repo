@extends('dashboard.master')

@section('title')
All Categories
@endsection

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Add New Post</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('posts.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

      @include('dashboard.posts.form')

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>

@endsection
