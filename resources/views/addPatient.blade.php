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
                        <form action="{{route('patient.store')}}" method="post" class="col-sm-12">
                          @csrf
                              <label for="sel1"><span style="color:red">Patient</span> NAME <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="name" value="{{old('name')}}"><br>

                              <label for="sel1">Mobile No <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="mobile" value="{{old('mobile')}}"><br>

                               <label for="sel1">profession</label>
                                  <input type="text" class="form-control" name="prof" value="{{old('prof')}}"><br>

                                  <label for="sel1">Address</label>
                                  <input type="text" class="form-control" name="addr" value="{{old('addr')}}"><br>


                              <label for="sel1"><span style="color:red">Responsible</span> Doc NAME and ID <span style="color:red">*</span></label><br>
                                  <input list="browsers" class="form-control" name="resposible_doc" value="{{old('resposible_doc')}}">
                                <datalist id="browsers">
                                  @foreach($therapist_data as $data)
                                    <option value="{{$data->t_id}}">{{$data->t_name}}
                                  @endforeach
                                </datalist><br>

                     <label >Treatment Start Date</label>
                     <input type="date" name="date" class="form-control" value="{{old('date')}}"><br>

                                 
                               <label for="sel1">Room No</label>
                                  <input type="text" class="form-control" value="0" name="room_no" value="{{old('room_no')}}"><br>

                                 
                               <label for="sel1">WC </label>
                                  <input type="text" class="form-control" value="0" name="wc" value="{{old('wc')}}"><br>

                                 
                               <label for="sel1">NID </label>
                                  <input type="text" class="form-control" value="0" name="nid" value="{{old('nid')}}"><br>

                                    

                     <input type="submit">
                 </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
