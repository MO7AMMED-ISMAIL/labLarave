@extends('layouts.app')

@section('content')


    <div class="container pt-3 ">
        <div class="card text-start">
            <h4 class="text-center">Update Post</h4>
            <form action="{{route('posts.update',$post['id'])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name: </label>
                        <input type="text" class="form-control" name="title" value="{{$post['title']}}" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">description</label>
                        <input type="text" class="form-control" name="description" aria-describedby="emailHelpId" value="{{$post['description']}}" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">User_id</label>
                        <input type="number" class="form-control" name="user_id" value="{{$post['user_id']}}" />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">image</label>
                        <input type="file" class="form-control" name="image" />
                    </div>

                    <div class="mb-3">
                        <img src="{{asset('images/'.$post['image'])}}" alt="" width="100px" height="100px">
                    </div>


                    <div class="m-3 p-3 text-center">
                        <input type="submit" class="btn btn-primary w-50">
                    </div>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            </div>
        </div>

    </div>

    @endsection
