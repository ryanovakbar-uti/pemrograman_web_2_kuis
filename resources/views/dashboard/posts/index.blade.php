@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-primary alert-dismissible fade show fw-bold fs-5 text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive small">
        <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-striped fs-5 text-center">
            <thead>
                <tr>
                    <th class="px-4 text-white" style="background-color: #DE1616;">#</th>
                    <th class="col-6 text-white" style="background-color: #DE1616;">Post Name</th>
                    <th class="col-4 text-white" style="background-color: #DE1616;">Category Name</th>
                    <th class="col-2 text-center text-white" colspan="3" style="background-color: #DE1616;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td style="text-align: justify">{{ $post->header }}</td>
                        <td style="text-align: justify">{{ $post->category->name }}</td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-primary text-decoration-none">Detail</a>
                        </td>
                        <td>
                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning text-decoration-none">Edit</a>
                        </td>
                        <td>
                            <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 text-decoration-none" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection