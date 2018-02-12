<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_id', 'room_id',
    ];


    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function room() {
    	return $this->belongsTo('App\Room', 'room_id', 'id');
    }
}
