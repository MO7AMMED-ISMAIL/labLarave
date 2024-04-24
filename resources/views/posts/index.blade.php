@extends('layouts.app')

@section('content')
    <div class="container p-3">
        <a href="/posts/create" class="btn btn-primary">Create</a>
        <table class="table">
            <tr>
                <th>title</th>
                <th>description</th>
                <th>image</th>
                <th>Add Comment</th>
                <th>Show All Comment</th>
                <th>created By</th>
                <th>control</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['title']}}</td>
                    <td class="w-25">{{ $post['description']}}</td>
                    <td>
                        @if (Str::startsWith($post['image'], 'https://'))
                            <img src="{{ $post['image'] }}" alt="Image" width="50px" height="50px">
                        @else
                            <img src="{{asset('images/'.$post['image'])}}" alt="Image" width="50px" height="50px">
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-primary mt-2 " href="{{route('comments.create',$post['id'])}}">Add Comment</a>
                    </td>

                    <td>
                        <a class="btn btn-primary mt-2"data-bs-toggle="modal"
                        data-bs-target="#modalId" >Show All Comment</a>
                        <!-- Button trigger modal -->
                    </td>

                    <td>{{ $post->user->id}}</td>
                    <td class="d-flex justify-content-around mt-3">
                        <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-primary">Edit</a>
                        <a href="/posts/{{ $post['id'] }}" class="btn btn-info">Show</a>
                        <form action="/posts/{{ $post['id'] }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>


@endsection
