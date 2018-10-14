<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'user_id', 'friend_id', 'message',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function friend()
    {
        return $this->belongsTo('App\User', 'friend_id');
    }
}
