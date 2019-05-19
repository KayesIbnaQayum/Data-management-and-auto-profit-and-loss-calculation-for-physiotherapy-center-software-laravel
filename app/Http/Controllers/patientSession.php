<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests\patientSessionRule;
use App\patient_session as patientSessions;

class patientSession extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patient_data = DB::select("select id as 'p_id', name as 'p_name' from patientinfo");
        $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");


        return view('patientSession', ['therapist_data'=>$therapist_data, 'patient_data'=>$patient_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(patientSessionRule $Request)
    {
        //
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
        $patientSession->patient_id = $request->input('patient_id');
        $patientSession->therapist_id = $request->input('Therapist');
        $patientSession->rate = $request->input('rate');
        $patientSession->session_time = $request->input('sessionTime');
        $patientSession->session_date = $request->input('date');

        $patientSession->save();

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
        $patient_data = DB::select("select id as 'p_id', name as 'p_name' from patientinfo");
        $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");


        return view('patientSession_edit', ['therapist_data'=>$therapist_data, 'patient_data'=>$patient_data, 'data'=>$data]);
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
        $patientSession->patient_id = $request->input('patient_id');
        $patientSession->therapist_id = $request->input('Therapist');
        $patientSession->rate = $request->input('rate');
        $patientSession->session_time = $request->input('sessionTime');
        $patientSession->session_date = $request->input('date');
        $patientSession->save();

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
            return redirect()->route('home')->with('status', 'Patient session Deleted');
        }else{
            $redirect = 'patientSession/'.$id.'/edit';
        //
         return redirect($redirect)->with('cerror', 'You must click Delete Checkbox to delete');
        }
        
    }
}
