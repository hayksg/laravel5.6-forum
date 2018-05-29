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
    
    public function best_answer(Reply $reply)
    {
        $reply->best_answer = 1;
        $reply->save();
        
        $reply->user->points += 100;
        $reply->user->save();
        
        Session::flash('success', 'Replay has been marked as the best answer.');
        return back();
    }
    
    public function edit(Reply $reply)
    {
        return view('replies.edit', compact('reply'));
    }
    
    public function update(Reply $reply)
    {
        $this->validate(request(), [
            'content'    => 'required'
        ]);
        
        $reply->content = request('content');
        $reply->save();
        
        Session::flash('success', 'Replay updated.');
        return redirect()->route('discussion', ['slug' => $reply->discussion->slug]);
    }
}
