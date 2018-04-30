<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use App\Like;
use Session;

class RepliesController extends Controller
{
    public function like(Reply $reply)
    {
        Like::create([
            'reply_id' => (int)$reply->id,
            'user_id'  => (int)auth()->id(),
        ]);
        
        Session::flash('success', 'You liked the reply.');
        return back();
    }
    
    public function unlike(Reply $reply)
    {
        $like = Like::where('reply_id', $reply->id)->where('user_id', auth()->id())->first();
        
        $like->delete();
        
        Session::flash('success', 'You unliked the reply.');
        return back();
    }
}
