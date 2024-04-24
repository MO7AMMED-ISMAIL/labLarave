@extends('layouts.app')

@section('content')

    <div class="container p-3">
        <table class="table">
            <tr>
                <th>Comment</th>
                <th>User</th>
                <th>Post</th>
            </tr>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{$comment['comment']}}</td>
                    <td>{{$comment->user->name}}</td>
                    <td>{{$comment->post->title}}</td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $comments->links('pagination::bootstrap-5') }}
        </div>
    </div>


@endsection()
