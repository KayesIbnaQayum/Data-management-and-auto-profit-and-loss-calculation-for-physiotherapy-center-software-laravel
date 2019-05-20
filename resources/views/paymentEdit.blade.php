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
                        <form action="{{route('payment.update', ['id'=> $dataz->id])}}" method="post" class="col-sm-12">
                          @csrf
                          @method('put')
                              <label for="sel1">Patient NAME and ID</label><br>
                                  <input list="browsers" class="form-control" name="patient_id" value="{{$dataz->patient_id}}">
                                <datalist id="browsers">
                                  @foreach($patient_data as $data)
                                    <option value="{{$data->p_id}}">{{$data->p_name}}
                                  @endforeach
                                </datalist><br>



                    <label style="color:red">Payment Amount</label> 
                    <select name="pay_status" value="">
                        <option value="paid" selected="">paid</option>
                        <option value="due">DUE</option>
                      </select>   
                     <input type="text" class="form-control" name="paid" value="{{$dataz->paid}}"><br>            

                     <label >Date</label>
                     <input type="date" name="date" class="form-control" value="{{$dataz->paid_date}}"><br>

                              <label for="sel1">Session ID</label><br>
                                  <input list="sessionBrowsers" class="form-control" name="session_id" value="{{$dataz->session_id}}">
                                <datalist id="sessionBrowsers">
                                  @foreach($session_data as $datas)
                                    <option value="{{$datas->s_id}}">
                                  @endforeach
                                </datalist><br>
                     <input type="submit">

                     <form action="{{route('payment.destroy', ['id'=> $dataz->id])}}">
                      @csrf
                      @method('delete')

                      <br>
                      <br>
                      <br><input type="checkbox" name="delete" value="1"><p style="color:red">I want to delete this<p><br>
                      <input type="submit" value="Delete"> 
                    </form>
                 </form>
                 </form>


                    </div>

                 <div class="row">
                    <p> patient name</p>
                    <p> Total Due </p>
                 </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
