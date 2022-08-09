<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(){
        $comments = Comment::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.notifications.index', compact('comments'));
    }

    public function countnotifications(){
        $comments = Comment::where('viewed', false)->count();
        return $comments;
    }

    public function setviewed(Request $request){
        //return response()->json($request->id);
        //$comment = Comment::where('comment_id', $request->id)->first();
        $comment = Comment::find($request->id);
        //return response()->json($comment);
        $comment->viewed = true;
        $comment->save();
        return response()->json('se cambio el estado');
    }

    public function show(Comment $comment){
        return view('admin.notifications.show', compact('comment'));
    }
}
