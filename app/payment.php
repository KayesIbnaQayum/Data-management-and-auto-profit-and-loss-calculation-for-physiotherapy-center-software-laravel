<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\patientListView;
use App\patient_session;

class payment extends Model
{
    //
    protected $table = 'payment';

    public function patient()
  {
      return $this->belongsTo('App\patientListView', 'patient_id', 'id');
  }

      public function patient_session()
  {
      return $this->belongsTo('App\patient_session', 'session_id', 'id');
  }
}
