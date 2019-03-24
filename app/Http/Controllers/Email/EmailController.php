<?php

namespace App\Http\Controllers\Email;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Accountant;
use App\Mail\AccountantConfirmed;

class EmailController extends Controller
{
    public function sendMail(){
    	Mail::to("pramodyacharithc@gmail.com")->send(new AccountantConfirmed(new Accountant()));
    }
}
