<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adchat extends Model
{
    protected $table='adchats';

    public function chatMessages(){
    	return $this->hasMany('App\AdminChat','chatid');
    }

    public function users(){
    	$this->hasOne('App\User','userid');
    }

    public function admins(){
    	$this->hasOne('App\Admin','adminchats');
    }
}
