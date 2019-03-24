<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class SiteController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:user');

    }

    public function showProjectList(){
    	return view('final.user.pages.projectlist',['userType'=>$this->isAdmin()]);
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
