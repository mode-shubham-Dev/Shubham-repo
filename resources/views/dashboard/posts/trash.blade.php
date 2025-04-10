@extends('dashboard.master')

@section('title', 'Trashed Posts')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Trashed Posts</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Name</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Details</th>
                <th>Thumbnail</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->category->title ?? 'No Category' }}</td>
                    <td>
                        @if ($post->tags->isNotEmpty())
                            @foreach ($post->tags as $tag)
                                <span class="badge bg-primary">{{ $tag->title }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">No Tags</span>
                        @endif
                    </td>
                    <td>{{ Str::limit($post->detail, 50) }}</td>
                    <td>
                        @if ($post->thumbnail)
                            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" 
                                class="rounded" style="width: 50px; height: 50px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('posts.restore', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Restore</button>
                        </form>
                        <form action="{{ route('posts.forceDelete', $post) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to permanently delete this post?');">Force Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $posts->links() !!}
  </div>
</div>
@endsection