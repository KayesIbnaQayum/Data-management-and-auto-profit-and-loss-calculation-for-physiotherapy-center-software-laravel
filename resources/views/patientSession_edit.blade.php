@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                      @if (session('cerror'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('cerror') }}
                        </div>
                    @endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <!--Component-->
                    @include('menu/topMenu')

                    <div class="row">
                        <form action="{{route('patientSession.update', ['id'=> $data->id])}}" method="post" class="col-sm-12">
                            @csrf
                            @method('put')
                              <label for="sel1"><span style="color:red">Patient</span> NAME and ID<span style="color:red">*</span></label><br>
                                  <input list="browsers" class="form-control" name="patient_id" value="{{$data->patient_id}}">
                                <datalist id="browsers" >
                              @foreach($patient_data as $patient_datas)
                                  <option value="{{$patient_datas->p_id}}">{{$patient_datas->p_name}}
                              @endforeach
                      

                                </datalist><br>

                              <label for="sel1">Therapist NAME and ID<span style="color:red">*</span></label>
                                  <input list="Therapist" class="form-control" name="Therapist" value="{{$data->therapist_id}}">
                                <datalist id="Therapist">
                              @foreach($therapist_data as $therapist_datas)
                                  <option value="{{$therapist_datas->t_id}}">{{$therapist_datas->t_name}}
                              @endforeach
                                </datalist><br>


                              <label for="sel1">Session Time<span style="color:red">*</span></label>
                                  <select class="form-control" id="sel1" name="sessionTime" value="{{$data->session_time}}">
                                    <option value='Morning'>Morning</option>
                                    <option value='Evening'>Evening</option>
                                    <option value='Night'>Night</option>
                                  </select><br>
                    
                     <label id="lbl">Session Date<span style="color:red">*</span></label>
                     <input type="date" id="date" name="date"  class="form-control" value="{{$data->session_date}}"><br>

                    <label >Rate<span style="color:red">*</span></label>    
                     <input type="text" class="form-control" name="rate" value="{{$data->rate}}"><br>

                    <label >Paid<span style="color:red">*</span></label>    
                     <input type="text" id="paid" class="form-control" name="paid" value="{{$paid}}"><br>            

                     <input type="submit">

                 </form>

                     <form action="{{route('patientSession.destroy', ['id'=> $data->id])}}" method="post">
                      @csrf
                      @method('delete')

                      <br>
                      <br>
                      <br><input type="checkbox" name="delete" value="1"><p style="color:red">I want to delete this<p><br>
                      <input type="submit" value="Delete"> 
                    </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
