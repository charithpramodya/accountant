<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adchat as AC;
use App\AdminChat;
use Auth;

class ChatController extends Controller
{
    
    public function __construct(){
    	$this->middleware('auth:user');
    }

    public function getChats(){
    	return AdC::all();
    }

    public function getChatMsges()
    {
        return response()->json(AC::with('chatMessages')->where('adminid',Auth::id())->get());
    	//return Auth::id();
        //return ;
    }

    public function getChat(Request $request){
        return response()->json(AdminChat::where('chatid',$request->chatid)->get());
    }

    public function sendMsges(Request $request){

    	//return $request->chatid;
    	$isAdmin=$this->isAdmin();
    	$message=$request->message;
    	$chatid=$request->chatid;

    	$msg=AdminChat::create([
            'admintouser' => $isAdmin,
            'message' => $message,
            'chatid' => $chatid
        ]);
    	
    }

    public function showChat(){
    	return view('chats.chats');
    }

    public function test(){
    	return response()->json(Auth::user());
    }

    protected function isAdmin(){
    	if(Auth::guard('user')){
    		return 0;
    	}else if(Auth::guard('admin')){
    		return 1;
    	}
    }
}
