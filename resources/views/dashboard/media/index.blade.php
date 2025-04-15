@extends('dashboard.master')
@section('title', 'All Media')

@section('content')
<div class="container mt-4">
    <h2>Media Manager</h2>

    <form method="GET" class="mb-4">
        <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="form-control" />
    </form>

    <div class="row">
        @foreach ($media as $file)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $file->getUrl() }}" class="card-img-top" alt="{{ $file->file_name }}" style="height:200px; object-fit:cover;">
                    <div class="card-body text-center">
                        <p class="card-text">{{ $file->name }}</p>
                        <a href="{{ route('media.download', $file) }}" class="btn btn-sm btn-primary">Download</a>
                        <form action="{{ route('media.destroy', $file) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $media->links() }}
</div>
@endsection
