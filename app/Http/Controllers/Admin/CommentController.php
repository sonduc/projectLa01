<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function postComment(Request $request,$id){
    	$post_id = $id;
    	$post= Post::find($id);
    	$comment= new Comment;
    	$comment->post_id = $post_id;
    	$comment->user_id = Auth::user()->id;
    	$comment->content = $request->content;
    	$comment->save();

    	return redirect("blog/post/$id/".$post->thumbnail.".html");
    }
}
