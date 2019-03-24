<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Project;
use App\AcChatMsges as ACM;
use App\Events\MessagePosted;

class ProjectController extends Controller
{
    public function getUserProjects(Request $request){

        return Project::with('documents')->with('acChat')->with('accountant')->with('user')->where('userid',$request->userid)->get();
        
    }

    public function getAccountantProjects(Request $request){
 
        return Project::with('documents')->with('acChat')->with('accountant')->with('user')->where('accid',$request->userid)->get();
        
    }

    public function getChatMessages(Request $request){

    	$messages=ACM::where('chatid',$request->chatid)->get();
    	return response()->json($messages);
    	//return $request->chatid;
    	
    }

    public function sendChatMessages(Request $request){
    	$user=Auth::user();
    	if($request->userType==0){
    		$acctouser=0;
    	}else{
    		$acctouser=1;
    	}
        
    	$message=ACM::create([
            'acctouser' =>$acctouser ,
            'message' => $request->message,
            'chatid'=>$request->chatid
        ]);

        broadcast(new MessagePosted(Auth::user(),$message,$request->projectid))->toOthers();

	return response()->json($message);


    }
}
