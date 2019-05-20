<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\paymentRule;
use App\payment as payment;
use DB;

class paymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //r
        $data = DB::table('payment as p')->join('patientinfo as pi', 'pi.id', '=', 'p.patient_id')->join('patient_session as s', 's.id', '=', 'p.session_id')->select('p.*', 'pi.name as p_name', 's.rate')->orderBy('p.id', 'desc')->paginate(20);


        return view('paymentView')->with('data', $data);
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
        $session_data = DB::select("select id as 's_id' from patient_session");


        return view('addPayment', ['session_data'=>$session_data, 'patient_data'=>$patient_data]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(paymentRule $request)
    {
        //
        $patient_id = $request->input('patient_id');
        $session_id = $request->input('session_id');
        $check = payment::where('session_id', '=', $session_id)->where('patient_id', '=', $patient_id)->first();

        if(empty($check)){
        $data = new payment;
        $data->patient_id = $patient_id;
         $data->paid_date = $request->input('date');
          $data->session_id = $session_id;

        // is it due or advance paid
          $pstatus = $request->input('pay_status');
          $amount_money = $request->input('paid');


           
            $amount = $this->payment_amount($amount_money, $pstatus);
           $data->paid = $amount;
           $data->save();

           return redirect()->route('payment.create')->with('status', 'payment successful');
        }else{
            return redirect()->route('patientSession.edit', ['id'=>$session_id])->with('status', 'Patient Session Exist, you can edit it here');
        }

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
        $patient_data = DB::select("select id as 'p_id', name as 'p_name' from patientinfo");
        $session_data = DB::select("select id as 's_id' from patient_session");
        $data = payment::find($id);
        return view('paymentEdit', ['dataz'=>$data, 'session_data'=>$session_data, 'patient_data'=>$patient_data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(paymentRule $request, $id)
    {
        //
        $data = payment::find($id);
        $data->patient_id = $request->input('patient_id');
         $data->paid_date = $request->input('date');
          $data->session_id = $request->input('session_id');

        // is it due or advance paid
          $pstatus = $request->input('pay_status');
          $amount_money = $request->input('paid');


           
            $amount = $this->payment_amount($amount_money, $pstatus);
           $data->paid = $amount;
           $data->save();

           return redirect()->route('payment.edit', $id)->with('status', 'payment Edited');
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
            payment::find($id)->delete();
            return redirect()->route('payment.index')->with('status', 'Payment Deleted');
        }else{
            $redirect = route('payment.edit', ['id'=>$id]);
        //
         return redirect($redirect)->with('cerror', 'You must click Delete Checkbox to delete');
        }
    }

    protected function payment_amount($amount_money, $pstatus){
        if($amount_money < 0){
            return  $amount_money;
          }else if($pstatus == 'due'){
            return '-'.$amount_money;
        }else{
             return $amount_money;
        }

    }
}
