<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patientListView as  patientListView;
use DB;
use App\Http\Requests\patientRule;

class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('patientinfo as p')->leftJoin('docinfo as d', 'd.id', '=', 'p.resposible_doc')->select('p.*', 'd.name as d_name')->orderBy('p.id', 'desc')->paginate(20);


        return view('patientListView')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");

        return view('addPatient')->with('therapist_data', $therapist_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(patientRule $request)
    {
                        //
        $doc = new patientListView;
        $doc->name = $request->input('name');
         $doc->mobile = $request->input('mobile');
          $doc->address = $request->input('addr');
           $doc->profession = $request->input('prof');
            $doc->NID = $request->input('nid');
            $doc->resposible_doc = $request->input('resposible_doc');
        
            $doc->room_no = $request->input('room_no');
            $doc->wc = $request->input('wc');

            
       

        $doc->save();

         return redirect()->route('patient.create')->with('status', 'Patient Edited');
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
        //
        $data = patientListView::find($id);
         $therapist_data = DB::select("select id as 't_id', name as 't_name' from docinfo");
        return view('patient_edit', ['data'=>$data, 'therapist_data'=>$therapist_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(patientRule $request, $id)
    {
        //
     $doc =  patientListView::find($id);
        $doc->name = $request->input('name');
         $doc->mobile = $request->input('mobile');
          $doc->address = $request->input('addr');
           $doc->profession = $request->input('prof');
            $doc->NID = $request->input('nid');
            $doc->resposible_doc = $request->input('resposible_doc');
        
            $doc->room_no = $request->input('room_no');
            $doc->wc = $request->input('wc');

            
       

        $doc->save();

         return redirect()->route('patient.edit', $id)->with('status', 'Patient Added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($req->input('delete') == 1){
            doc::find($id)->delete();
            return redirect()->route('doctor')->with('status', 'Patient session Deleted');
        }else{
            $redirect = route('doctor.edit', $id);
        //
         return redirect($redirect)->with('cerror', 'You must click Delete Checkbox to delete');
        }
    }
}
