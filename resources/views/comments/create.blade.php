@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <form action="{{route('comments.store',$id)}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <input type="text" class="form-control" name="comment" placeholder="Enter your comment "/>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

