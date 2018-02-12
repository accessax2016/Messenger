<?php

namespace App\Http\Controllers\api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Pusher;

class UserController extends Controller
{
    public function getCurrentUser() {
        return Auth::user();
    }

    public function getUsersInChannels() {
    	// $channel_name = 'presence-room.'.$room_id;
    	$url = '/channels';
    	$response = Pusher::get($url, array('filter_by_prefix' => 'presence-', 'info' => 'user_count'));
    	if( $response['status'] == 200 ) {
  			// convert to associative array for easier consumption
    		$result = json_decode( $response['body'], true );
    		return $result;
    	}
    }
}
