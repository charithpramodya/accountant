<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Accountant;
use App\Project;
use Auth;

class SiteController extends Controller
{


	public function __construct(){
		$this->middleware('auth:admin');
	}

	public function showUserList(){
		$users=User::where('status',1)->get();

		return view('final.Admin.pages.userlist',['users'=>$users]);
	}

	public function showAddUser(){
		return view('final.Admin.pages.aduser');
	}

	public function showNewUsers(){
		$users=User::where('status',0)->get();
		return view('final.Admin.pages.newusers',['users'=>$users]);
	}

	public function showBlockedUsers(){
		$users=User::where('status',2)->get();
		return view('final.Admin.pages.blockedusers',['users'=>$users]);
	}

	public function showAddAccountant(){
		return view('final.Admin.pages.adaccountant');
	}

	public function showAccountantList(){
		$accountants=Accountant::where('status',1)->get();

		return view('final.Admin.pages.accountantlist',['accountants'=>$accountants]);
	}

	public function showProjectList(){
		$projects=Project::with('user')->get();

		return view('final.Admin.pages.projectlist',['projects'=>$projects]);
	}

	public function showProject(Request $request){
		//$id=$request->id;

		//$project=Project::with('documents')->where('id',$id)->first();
		//return $project;
		return view('chats.project',['userType'=>$this->isAdmin()]);
	}

	protected function isAdmin(){
	    	if(Auth::guard('user')->check()){
	    		return 0;
	    	}else if(Auth::guard('admin')->check()){
	    		return 1;
	    	}else if(Auth::guard('accountant')->check()){
	    		return 3;
	    	}
    	}


}
