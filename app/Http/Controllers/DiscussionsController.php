<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use App\User;
use Notification;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }
    
    public function store()
    {
        $r = request();
        
        /*
        
        $this->validate($r, [
            'channel_id' => 'required|integer',
            'title'      => 'required|regex:/^[^<>]+$/u',
            'content'    => 'required|regex:/^[^<>]+$/u'
        ]);
         
        */
        
        $this->validate($r, [
            'channel_id' => 'required|integer',
            'title'      => 'required',
            'content'    => 'required'
        ]);
        
        $discussion = Discussion::create([
            'channel_id' => $r->channel_id,
            'title'      => $r->title,
            'content'    => $r->content,
            'user_id'    => auth()->id(),
            'slug'       => str_slug($r->title),
        ]);
        
        session()->flash('success', 'Discussion successfully created');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }
    
    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        
        if ($discussion) {
            $best_answer = $discussion->replies()->where('best_answer', 1)->first();
        
            return view('discussions.show')->with('discussion', $discussion)
                                           ->with('best_answer', $best_answer);
        }
        
        return redirect()->route('forum');
    }
    
    public function reply(Discussion $discussion)
    {
        /*
        $this->validate(request(), [
            'reply'    => 'required|regex:/^[^<>]+$/u'
        ]);       
        */
    
        $this->validate(request(), [
            'reply'    => 'required'
        ]);
        
        $reply = Reply::create([
            'user_id' => auth()->id(),
            'discussion_id' => $discussion->id,
            'content' => request('reply')
        ]);
        
        // Giving users new points for reply
        $reply->user->points += 25;
        $reply->user->save();
        
        // Notification for watchers
        $watchers = [];
        
        foreach ($discussion->watchers as $watcher) {
            array_push($watchers, User::find($watcher->user_id));
        }
        
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));
        
        session()->flash('success', 'Replied to discussion');
        return back();
    }
    
    public function edit($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        return view('discussions.edit', ['discussion' => $discussion]);
    }
    
    public function update(Discussion $discussion)
    {
        /*
         
        $this->validate(request(), [
            'content'    => 'required|regex:/^[^<>]+$/u'
        ]);
        
        */
        
        $this->validate(request(), [
            'content'    => 'required'
        ]);
        
        $discussion->content = request('content');
        $discussion->save();
        
        session()->flash('success', 'Discussion updated');
        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }
}
