@extends('layouts.admin.main')

@section('title')
    dashboard
@endsection

@section('content')
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-body">
                    <div>
                        <h4 class="card-title">
                            <a href="{{ route('posts.create') }}" class="btn bnt-sm btn-primary">
                                <i class="fas fa-plus"></i>
                            </a>
                        </h4>
                    </div>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Title_en</th>
                            <th>Title_fr</th>
                            <th>Category</th>
                            <th>By</th>
                            <th>Premium</th>
                            <th>Published</th>
                            <th>Image</th>
                            <th>Added</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($posts as $key => $post)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post) }}" target="blank">
                                            {{ $post->title_en }}
                                        </a>
                                    </td>
                                    <td>{{ $post->title_fr }}</td>
                                    <td>{{ $post->category->name_en }}</td>
                                    <td>{{ $post->admin->name }}</td>
                                    <td>
                                        @if ($post->premium)
                                            <a href="{{ route('toggle.premium', $post) }}">
                                                <span class="badge bg-success">
                                                    premium
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{ route('toggle.premium', $post) }}">
                                                <span class="badge bg-info">
                                                    simple
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($post->published)
                                            <a href="{{ route('toggle.published', $post) }}">
                                                <span class="badge bg-success">
                                                    published
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{ route('toggle.published', $post) }}">
                                                <span class="badge bg-info">
                                                    draft
                                                </span>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <img src="{{ asset($post->photo) }}" width="60" height="60" class="rounded"
                                            alt="{{ $post->title_en }}">
                                    </td>
                                    <td>{{ $post->created_at->DiffForHumans() }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit "></i>
                                        </a>
                                        <button
                                            onclick="
                                            if(confirm('are you sure ?'))
                                            document.getElementById({{ $post->id }}).submit();"
                                            class="btn btn-sm btn-danger mx-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <form id="{{ $post->id }}" action="{{ route('posts.destroy', $post) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
