@extends('dashboard.master')

@section('title')
All Categories
@endsection

@section('content')

<div class="card mt-5">
  <h2 class="card-header">Shubham's Crude Dude</h2>
  <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}"> 
                <i class="fa fa-plus"></i> Create New Category
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">S.N</th>
                    <th>Title</th>
                    <!-- <th>Slug</th> -->
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->title }}</td>
                    <!-- <td>{{ $category->slug }}</td> -->
                    <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('categories.show', $category->id) }}">
                                <i class="fa-solid fa-list"></i> Show
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        
        {!! $categories->links() !!}

  </div>
</div>
@endsection
