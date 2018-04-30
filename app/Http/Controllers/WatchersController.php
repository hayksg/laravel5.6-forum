<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Watcher;
use Session;

class WatchersController extends Controller
{
    public function watch(Discussion $discussion)
    {
        Watcher::create([
            'discussion_id' => (int)$discussion->id,
            'user_id' => (int)auth()->id(),
        ]);
        
        Session::flash('success', 'You are watching this discussion.');
        return back();
    }
    
    public function unwatch(Discussion $discussion)
    {
        $watcher = Watcher::where('discussion_id', (int)$discussion->id)->where('user_id', (int)auth()->id());
        $watcher->delete();
        
        Session::flash('success', 'You are no longer watching this discussion.');
        return back();
    }
}
