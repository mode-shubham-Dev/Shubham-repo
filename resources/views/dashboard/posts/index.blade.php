@extends('dashboard.master')

@section('title', 'All Posts')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Shubham's Crude Dude</h2>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
            @endif

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @can('post-create')


                        <a class="btn btn-success btn-sm" href="{{ route('posts.create') }}">
                            <i class="fa fa-plus"></i> Create New Post
                        </a>
                        <a class="btn btn-warning btn-sm" href="{{ route('posts.trashed') }}">
                            <i class="fa fa-trash"></i> Trash
                        </a>

                    @endcan
                </div>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                    <tr>
                        <th width="50px">S.N</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Details</th>
                        <th>Thumbnail</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($posts as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->category->title ?? 'No Category' }}</td>
                            <td>
                                @forelse ($post->tags as $tag)
                                    <span class="badge bg-primary">{{ $tag->title }}</span>
                                @empty
                                    <span class="text-muted">No Tags</span>
                                @endforelse
                            </td>
                            {{-- <td><span>{{ Str::limit($post->detail, 50) }}</span></td> --}}
                            <td><span>{!! $post->detail!!}</span></td>
                            <td>
                                @if ($post->hasMedia('thumbnails'))
                                    <img src="{{ $post->getFirstMediaUrl('thumbnails', 'thumb') }}" alt="Thumbnail" class="rounded"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @can('post-list')
                                        <a class="btn btn-info btn-sm" href="{{ route('posts.show', $post->id) }}">
                                            <i class="fa-solid fa-list"></i> Show
                                        </a>
                                    @endcan

                                    @can('post-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                    @endcan

                                    @can('post-delte')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this post?');">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    @endcan

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No posts available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {!! $posts->links() !!}
        </div>
    </div>
@endsection