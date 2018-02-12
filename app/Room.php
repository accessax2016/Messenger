<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'user_id'
    ];


    public function user() {
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function messages() {
        return $this->hasMany('App\Message', 'room_id', 'id');
    }
}
