<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'channel_id', 'slug'];
    
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function watchers()
    {
        return $this->hasMany(Watcher::class);
    }
    
    public function is_being_watched_by_auth_user()
    {
        $userId = auth()->id();
        $watchers_ids = [];
        
        foreach($this->watchers as $watcher) {
            array_push($watchers_ids, $watcher->user_id);
        }
        
        if (in_array($userId, $watchers_ids)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function hasBestAnswer()
    {
        $result = false;
        foreach ($this->replies as $reply) {
            if ($reply->best_answer) {
                $result = true;
                break;
            }
        }
        return $result;
    }
}
