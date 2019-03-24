<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Accountant;
use App\Http\Controllers\AccountantAuth\RegisterController;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * get new users
     * @return user list	
    **/
    public function userlist(){
    	return User::all();
    }

    public function newUsers(){
        return User::where('status',0)->get();

    }

    /**
     * get Accountant list
     * @return Accountant list	
    **/
    public function accountantList(){
    	return Accountant::all();
    }

    public function acceptUser(Request $request){
        $id=$request->id;

        $user=User::where('id',$id)->first();
        $user->status=1;
        //email part goes here

    }

    public function createAccountant(Request $request){
        $acc=new RegisterController();
        $acc->register($request);
        //email partr goes here

    }


}
