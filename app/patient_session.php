<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class patient_session extends Model
{
    // 
    protected $table = 'patient_session';

    public function payment(){
    	return $this->hasMany('App\payment', 'session_id','id');
    }
}
