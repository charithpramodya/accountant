<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminChat extends Model
{
    protected $table='adminchats';


    protected $fillable = [
        'admintouser', 'chatid', 'message',
    ];
    
}