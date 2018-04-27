<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = ['content', 'user_id', 'discussion_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    
    public function is_liked_by_auth_user()
    {
        $id = auth()->id();
        
        $likers = [];
        
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }
        
        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
