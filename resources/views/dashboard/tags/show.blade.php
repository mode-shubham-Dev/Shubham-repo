@extends('dashboard.master')

@section('title')
All Tags
@endsection

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Show Tag</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tags.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong> <br/>
                {{ $tag->title }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong> <br/>
                {{ $tag->slug }}
            </div>
        </div>
    </div>
  
  </div>
</div>
@endsection
