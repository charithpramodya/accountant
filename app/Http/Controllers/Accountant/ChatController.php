<?php

namespace App\Http\Controllers\Accountant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AccountantChat as AC;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:accountant');
    }

    public function getChat(){
    	return AC::where('accid',Auth::id())->get();
    }

    
}
