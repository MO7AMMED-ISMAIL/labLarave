<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //show all comment
    public function index()
    {
        $comments = Comment::paginate(5);
        return view('comments.index', compact('comments'));
    }

    //show one comment
    public function show($id)
    {
        $comment = Comment::find($id);
        return view('comments.show', compact('comment'));
    }

    //create new comment
    public function create($postID)
    {
        return view('comments.create',['id'=>$postID]);
    }

    //store new comment
    public function store(Request $request, $post_id)
    {
        $comments = $request->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            'comment' => $comments['comment'],
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
        ]);

        return redirect()->route('comments.index');
    }

    //edit comment
    public function edit($id)
    {
        //
    }

    //update comment
    public function update(Request $request, $id)
    {
        //
    }

    //delete comment
    public function destroy($id)
    {
        //
    }
}
