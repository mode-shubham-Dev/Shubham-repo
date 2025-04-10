@extends('dashboard.master')

@section('title')
All Categories
@endsection

@section('content')
  
<div class="card mt-5">
  <h2 class="card-header">Edit Category</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('categories.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('categories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        @include('dashboard.categories.form-input')
      
<!-- 
        <div class="mb-3">
            <label for="inputSlug" class="form-label"><strong>Slug:</strong></label>
            <input 
                type="text" 
                name="slug" 
                value="{{ $category->slug }}"
                class="form-control @error('slug') is-invalid @enderror" 
                id="inputSlug" 
                placeholder="Slug">
            @error('slug')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div> -->
  
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
  </div>
</div>
@endsection
