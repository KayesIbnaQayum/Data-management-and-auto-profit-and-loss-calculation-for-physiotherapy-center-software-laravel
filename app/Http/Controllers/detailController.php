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

    public function fullDetail($id=0, $from = '0000-00-00', $to = '9999-12-12', Request $req){
    	if(request()->has('from') && request()->has('to')){
    		$from = $req->query('from');
    		$to = $req->query('to');
    	}
    	
    	
    	$data = DB::table('patientinfo as pi')->join('patient_session as ps', 'pi.id', '=', 'ps.patient_id')->join('docinfo as d', 'd.id', '=', 'ps.therapist_id')->where('pi.id', '=',$id)->where('ps.session_date', '>=',$from)->where('ps.session_date', '<=', $to)->select('d.name as d_name','d.id as d_id', 'pi.name as p_name', 'pi.id as p_id','ps.id as session_id','ps.session_time as session_time', 'ps.session_date as date', 'ps.rate as rate')->orderBy('ps.session_date', 'desc')->paginate(20);

    	 return view('fullDetail')->with('data', $data);
    }


}
