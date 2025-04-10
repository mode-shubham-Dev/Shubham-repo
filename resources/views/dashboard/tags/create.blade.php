@extends('dashboard.master')

@section('title')
All Tags
@endsection

@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Add New Tags</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tags.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('tags.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('dashboard.tags.form')
     
  

       
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>
  
  </div>
</div>
@endsection
