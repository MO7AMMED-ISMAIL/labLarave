@extends('layouts.app')

@section('content')

    <div class="container pt-3 ">
        <div class="card text-start">
            <h4 class="text-center">Create Posts</h4>
            <form action="/posts" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Post-Title: </label>
                        <input type="text" class="form-control" name="title" aria-describedby="emailHelpId" placeholder="Enter the title"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Post-Decription</label>
                        <input type="text" class="form-control" name="description" aria-describedby="emailHelpId" placeholder="Enter description"/>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Post - image</label>
                        <input type="file" class="form-control" name="image" >
                    </div>

                    <div class="m-3 p-3 text-center">
                        <input type="submit" class="btn btn-primary w-50">
                    </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
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

