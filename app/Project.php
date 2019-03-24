<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table='project';

    protected $fillable = [
        'name', 'description', 'userid', 'status', 'filenamehash'
    ];

    public function documents(){
    	return $this->hasMany('App\Document','projectid');
    }

    public function invoices(){
    	return $this->hasMany('App\Invoice','projectid');
    }

    public function receipts(){
    	return $this->hasMany('App\Receipt','projectid');
    }

    public function user(){
        return $this->belongsTo('App\User','userid');
    }

    public function acChat(){
        return $this->hasOne('App\AccountantChat','projectid');
    }

    public function accountant(){
        return $this->belongsTo('App\Accountant','accid');
    }

    
}
