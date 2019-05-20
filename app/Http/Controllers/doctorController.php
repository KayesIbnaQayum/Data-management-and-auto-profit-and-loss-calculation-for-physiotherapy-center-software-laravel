<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doc as doc;
use App\Http\Requests\doctorRequest;


class doctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $data = doc::paginate(20);
        
        return view('docListView')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('addDoc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(doctorRequest $request)
    {
                //
        $doc = new doc;
        $doc->name = $request->input('docName');
         $doc->mobile = $request->input('mobile');
          $doc->address = $request->input('addr');
           $doc->joined = $request->input('Joined_date');
            $doc->NID = $request->input('nid');
       

        $doc->save();

         return redirect()->route('doctor.create')->with('status', 'Doctor Added');
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
        $data = doc::find($id);
        return view('doc_edit')->with('data', $data);
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
                 $data = doc::find($id);
        $data->name = $request->input('docName');
        $data->mobile = $request->input('mobile');
        $data->address = $request->input('addr');
        $data->joined = $request->input('Joined_date');
        $data->NID = $request->input('nid');
        $data->save();

        $redirect = route('doctor.edit', $id);
        //
         return redirect($redirect)->with('status', 'Doctor Edited');
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
            doc::find($id)->delete();
            return redirect()->route('doctor')->with('status', 'Patient session Deleted');
        }else{
            $redirect = route('doctor.edit', $id);
        //
         return redirect($redirect)->with('cerror', 'You must click Delete Checkbox to delete');
        }
    }
}
