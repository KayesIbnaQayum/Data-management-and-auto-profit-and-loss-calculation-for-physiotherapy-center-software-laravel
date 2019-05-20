<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient_session as patientSessions;
use App\payment as payment;
use DB;

class detailController extends Controller
{
    //
    public function index(){
   	 $data = DB::select('SELECT p.id as `pi_id`, p.name as `pi_name` ,sum(paid) as `paid`,  (select sum(rate) FROM patient_session ps WHERE ps.patient_id = p.id GROUP BY ps.patient_id) as `rate` FROM patientinfo p, payment pm WHERE p.id = pm.patient_id GROUP BY p.id, p.name');

 
        return view('detail')->with('data', $data);
    }

    public function fullDetail(){
    	
    }
}
