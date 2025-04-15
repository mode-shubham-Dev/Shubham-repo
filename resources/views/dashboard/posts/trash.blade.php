@extends('dashboard.master')

@section('title', 'Trashed Posts')

@section('content')
<div class="card mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>Trashed Posts</h2>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-arrow-left"></i> Back to Posts
            </a>
        </div>
    </div>
    
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th width="50px">S.N</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Details</th>
                        <th>Thumbnail</th>
                        <th width="250px">Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category->title ?? 'None' }}</td>
                        <td>
                            @forelse($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->title }}</span>
                            @empty
                                <span class="text-muted">No tags</span>
                            @endforelse
                        </td>
                        <td>{{ Str::limit($post->detail, 50) }}</td>
                        <td>
                            @if($post->hasMedia('thumbnails'))
                                <img src="{{ $post->getFirstMediaUrl('thumbnails', 'thumb') }}" 
                                     alt="Thumbnail" class="img-thumbnail"
                                     style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary">No image</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                <form action="{{ route('posts.restore', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm px-3 py-1">
                                        <i class="fa fa-trash-restore"></i> Restore
                                    </button>
                                </form>
                                <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3 py-1" 
                                            onclick="return confirm('Are you sure you want to permanently delete this post?')">
                                        <i class="fa fa-trash-alt"></i> Delete Permanently
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No trashed posts found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>

<style>
    .btn-sm {
        min-width: 120px;
    }
    .gap-2 > * {
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
    }
    @media (max-width: 768px) {
        .d-flex.flex-wrap {
            flex-direction: column;
            gap: 0.5rem;
        }
        .btn-sm {
            width: 100%;
        }
    }
</style>
@endsection