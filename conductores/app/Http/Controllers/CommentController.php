<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //
    public function create(){

		$comment = new Comment;
        return view('comment.create')->with(['comment' => $comment]);
    
	}

	public function store(Request $request){

		$comment = new Comment;

		$comment->fill(

			$request->only('content')

		);
		$comment->user_id_where_comment = $request->user_id_where_comment;
		$comment->user_id = $request->user()->id;
		$comment->name = $request->user()->name;
		$comment->last_name = $request->user()->last_name;
		

		$comment->save();

		return back();

	}

	public function edit(Comment $comment)
    {
        if($comment->user_id != \Auth::user()->id) {
            return redirect()->route('comments_path');
        }
        
        return view('comments.edit')->with(['comment' => $comment]);
    }


    public function update(comment $comment, Request $request)
    {
        $comment->update(
           $request->only('content')
        );

        //session()->flash('message', 'comment Updated!');

        return redirect()->route('comments_path', ['comment' => $comment->id]);
    }

    public function delete(Comment $comment)
    {
        if($comment->user_id != \Auth::user()->id) {
            return redirect()->route('comments_path');
        }

        $comment->delete();

       // session()->flash('message', 'comment Deleted!');

        return Redirect::back();
    }

	public function index()
    {
        $comments = Comment::with('user')->orderBy('id', 'desc')->paginate(10);

        return view('comment.index')->with(['comments' => $comments]);
    }
}
