<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function userlist(){
    	return User::all();
    }
}
