<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss');
    }
    
    public function store()
    {
        $r = request();
        
        $this->validate($r, [
            'channel_id' => 'required|integer',
            'title'      => 'required|regex:/^[^<>]+$/u',
            'content'    => 'required|regex:/^[^<>]+$/u'
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
        
        return view('discussions.show')->with('discussion', $discussion);
    }
    
    public function reply(Discussion $discussion)
    {
        $this->validate(request(), [
            'reply'    => 'required|regex:/^[^<>]+$/u'
        ]);
        
        $reply = Reply::create([
            'user_id' => auth()->id(),
            'discussion_id' => $discussion->id,
            'content' => request('reply')
        ]);
        
        session()->flash('success', 'Replied to discussion');
        return back();
    }
}
