<?php

namespace App\Http\Controllers\Accountant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class SiteController extends Controller
{

	public function __construct(){
		$this->middleware('auth:accountant');
	}


	public function showProject(){
		$usertype=$this->isAdmin();
		return view('final.Accountant.pages.project',['userType'=>$usertype]);
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

    	public function showProjectByUser(){

    		$users=User::where(['projects' => function ($query) {
    			$query->where('accid',Auth::id());
		}])->get();

    		return $users;
    		//$projects=Project::with('user')->where('accid',Auth::id())->get();
    		//return view('final.Accountant.pages.projects');
    	}
}
