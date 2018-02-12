<?php

namespace App\Http\Controllers\api;

use App\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\RoomEvent;

class RoomController extends Controller
{
	public function getListRoom()
	{
		return Room::with('user')->get();
	}

	public function postCreateRoom(Request $request)
	{
		if ($request->image != null)
		{
			$name = str_random(10).".jpg";
			while (file_exists(public_path()."/image/room/".$name)) {
				$name = str_random(10).".jpg";
			}
			$path = public_path()."/image/room/" . $name;
			$fp = fopen( $path, 'wb' ); 
			$data = explode( ',', $request->image );
			fwrite( $fp, base64_decode( $data[ 1 ] ) );
			fclose( $fp ); 
		}
		else
		{
			$name = 'default.png';
		}

		$room = new Room();
		$room->name = $request->name;
		$room->name_url = changeTitle($request->name);
		$room->image = $name;
		$room->user_id = $request->user_id;
		$room->save();

		$response = Room::with('user')->findOrFail($room->id);

		broadcast(new RoomEvent($response))->toOthers();

		return $response;
	}
}
