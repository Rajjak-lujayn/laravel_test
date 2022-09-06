@extends('layout')
@section('title', 'Categories')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <div>
        <a class="btn btn-primary" href="{{ route('addCategory') }}">Add Category</a>
    </div>

    <form action="" method="GET">
        <input type="text" name="search" required />
        <button type="submit">Search</button>

    </form>


    {{-- @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <div class="post-list">
                <p>{{ $post->cat_name }}</p>
            </div>
        @endforeach
    @else
    
        <div>
            <h2>No posts found</h2>
        </div>
    @endif --}}
    <table id="table" class="table">

        <thead class="table-dark">
            <tr>
                <th scope="col">s.no.</th>
                <th scope="col">cat_name</th>
                <th scope="col">cat_desc</th>
                <th scope="col">cat_image</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $key => $categories)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $categories->cat_name }}</td>
                    <td>{{ $categories->cat_desc }}</td>
                    <td><img src="{{ url('public/image/' . $categories->cat_image) }}" width="80" height="80"></td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('editCategory', $categories->id) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('deleteCategory', $categories->id) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div>
        <a class="btn btn-primary" href="{{ route('logout') }}">logout</a>
    </div>
@endsection
