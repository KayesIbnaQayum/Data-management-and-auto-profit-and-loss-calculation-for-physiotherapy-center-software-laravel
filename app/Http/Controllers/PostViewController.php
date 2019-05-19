<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\patient_session as Psession;
use App\patientListView as patientListView;


class PostViewController extends Controller
{
    //

    public function view_session(){
    	$data = Psession::paginate(20);
    	
    	return view('sessionView')->with('data', $data);
    }


    public function view_patientList(){
    	$data = patientListView::paginate(20);
    	
    	return view('patientListView')->with('data', $data);
    }

    public function view_docList(){
    	
    	 $data = patientListView::paginate(20);
    	
    	return view('docListView')->with('data', $data);


    }

    

    

}
