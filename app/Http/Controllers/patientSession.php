<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\patientSessionRule;
use App\patient_session as patientSessions;
use App\payment as payment;

class patientSession extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = DB::table('patient_session')->join('patientinfo', 'patient_session.patient_id', '=', 'patientinfo.id')
        ->join('docinfo', 'patient_session.therapist_id', '=', 'docinfo.id')
        ->select('patient_session.id', 'patientinfo.name as patient_name','docinfo.name as doc_name', 'patient_session.patient_id', 'patient_session.therapist_id','patient_session.rate','docinfo.name', 'patient_session.session_date','patient_session.session_time')
        ->orderBy('session_date', 'desc')->paginate(20);


     

     
        
        return view('sessionView')->with('data', $data);
        //
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $patient_data = DB::select("select id as 'p_id', name as 'p_name' from patientinfo");
        $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");


        return view('patientSession', ['therapist_data'=>$therapist_data, 'patient_data'=>$patient_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(patientSessionRule $request)
    {
  

             
        //
        $patientSession = new patientSessions;
        $patient_id =  $request->input('patient_id');
        $therapist_id = $request->input('Therapist');

        //check validity
        $check_valid = $this->check_patient_doc_exist($patient_id, $therapist_id);

        if($check_valid){
            return redirect()->route('patientSession.create')->with('cerror', 'select doctor or patient from drop down menu');
        }

        $patientSession->patient_id = $patient_id;
        $patientSession->therapist_id = $therapist_id;
        $patientSession->rate = $request->input('rate');
        $patientSession->session_time = $request->input('sessionTime');
        $date = $request->input('date');
        $patientSession->session_date = $date;

         $paid = $request->input('paid');
         $rate = $request->input('rate');
   

         $check_patient_save = $patientSession->save();

         if($check_patient_save){
            $data = new payment;
             $data->patient_id = $patient_id;
             $data->paid = $paid;
             $data->paid_date = $date;

            $session_id = DB::select("SELECT `id` FROM `patient_session` ORDER BY `created_at` DESC LIMIT 1");
       
             $data->session_id = $session_id[0]->id;;
             $checkSaveData = $data->save();  
         }

         if($checkSaveData == false){
            patientSessions::find($session_id)->delete();
         }
    
      
      
        


        return redirect('patientSession')->with('status', 'Patient session Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = patientSessions::find($id);
        $paid = DB::select('select `paid` from `payment` where `session_id` = '.$id);
        
        if(!empty($paid[0]->paid)){
            $amount = $paid[0]->paid;
        }else{
            $amount = 0;
        }
       


       
     
        $patient_data = DB::select("select id as 'p_id', name as 'p_name' from patientinfo");
        $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");


        return view('patientSession_edit', ['therapist_data'=>$therapist_data, 'patient_data'=>$patient_data, 'data'=>$data, 'paid'=>$amount]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $patientSession = patientSessions::find($id);
        $patient_id =  $request->input('patient_id');
        $patientSession->patient_id = $patient_id;
        $therapist_id = $request->input('Therapist');
        //check validity
        $check_valid = $this->check_patient_doc_exist($patient_id, $therapist_id);

        if($check_valid){
             $redirect = 'patientSession/'.$id.'/edit';
            return redirect($redirect)->with('cerror', 'select doctor or patient from drop down menu');
        }

        $patientSession-> $therapist_id;
        $patientSession->rate = $request->input('rate');
        $patientSession->session_time = $request->input('sessionTime');
        $date = $request->input('date');
        $patientSession->session_date = $date;

         $paid = $request->input('paid');
         $rate = $request->input('rate');

        

         $check_patient_save = $patientSession->save();

         if($check_patient_save){
            $data = payment::where('session_id', '=', $id)->first();
             $data->patient_id = $patient_id;
             $data->paid = $paid;
             $data->paid_date = $date;

             $data->session_id = $id;
             $checkSaveData = $data->save();  
         }

       
    

        $redirect = 'patientSession/'.$id.'/edit';
        //
         return redirect($redirect)->with('status', 'Patient session Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        //
        if($req->input('delete') == 1){
            patientSessions::find($id)->delete();
            payment::where('session_id', '=', $id)->delete();
            return redirect()->route('patientSession.index')->with('status', 'Patient session Deleted');
        }else{
            $redirect = 'patientSession/'.$id.'/edit';
        //
         return redirect($redirect)->with('cerror', 'You must click Delete Checkbox to delete');
        }
        
    }

    protected function check_patient_doc_exist($doc_id, $patient_id){
        $checkDoc = DB::table('docinfo')->where('id', '=', $doc_id)->first();
        $checkpatient = DB::table('patientinfo')->where('id', '=', $patient_id)->first();

        if($checkDoc == null || $checkpatient == null){
            return true;
        }
    }
   
}
