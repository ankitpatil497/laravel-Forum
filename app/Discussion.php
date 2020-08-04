<?php

namespace App;

use App\Notifications\MarkAsBestReply;

class Discussion extends Model
{
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function replies(){
        return $this->hasMany(Reply::class);
    }


    public function markAsBestReply(Reply $reply){
        $this->update([
            'reply_id'=>$reply->id
        ]);

        $reply->owner->notify(new MarkAsBestReply($reply->discussion));
    }


    public function bestReply(){
        return $this->belongsTo(Reply::class,'reply_id');
    } 
}
