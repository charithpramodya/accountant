<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcChatMsges extends Model
{
   protected $table='acchatmsges';

    protected $fillable = [
        'acctouser', 'message', 'chatid'
    ];
}
