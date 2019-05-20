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
                        <form action="{{route('payment.store')}}" method="post" class="col-sm-12">
                          @csrf
                              <label for="sel1">Patient NAME and ID<span style="color:red">*</span></label><br>
                                  <input list="browsers" class="form-control" name="patient_id">
                                <datalist id="browsers">
                                  @foreach($patient_data as $data)
                                    <option value="{{$data->p_id}}">{{$data->p_name}}
                                  @endforeach
                                </datalist><br>



                    <label style="color:red">Payment Amount<span style="color:red">*</span><span style="color:red">*</span></label> 
                    <select name="pay_status">
                        <option value="paid" selected="">paid</option>
                        <option value="due">DUE</option>
                      </select>   
                     <input type="text" class="form-control" name="paid"><br>            

                     <label >Date<span style="color:red">*</span></label>
                     <input type="date" name="date" class="form-control"><br>

                              <label for="sel1">Session ID<span style="color:red">*</span></label><br>
                                  <input list="sessionBrowsers" class="form-control" name="session_id">
                                <datalist id="sessionBrowsers">
                                  @foreach($session_data as $datas)
                                    <option value="{{$datas->s_id}}">
                                  @endforeach
                                </datalist><br>
                     <input type="submit">
                 </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
