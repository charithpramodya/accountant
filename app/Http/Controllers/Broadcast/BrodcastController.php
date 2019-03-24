<?php

namespace App\Http\Controllers\Broadcast;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pusher\Pusher;

class BrodcastController extends Controller
{
    

	public function authenticate(Request $request){

		//return $request;
		$pusher = new Pusher(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'));
       		return $pusher;
       		//echo  $request->request->get('channel_name');
       		//return $pusher->socket_auth($request->request->get('channel_name'),$request->request->get('socket_id')); 
	}

     
}
