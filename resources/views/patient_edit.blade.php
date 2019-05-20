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
                        <form action="{{route('patient.update', $data->id)}}" method="post" class="col-sm-12">
                           @csrf
                           @method('put')
                              <label for="sel1"><span style="color:red">Patient</span> NAME <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="name" value="{{$data->name}}"><br>

                              <label for="sel1">Mobile No<span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}"><br>

                               <label for="sel1">profession</label>
                                  <input type="text" class="form-control" name="prof" value="{{$data->profession}}"><br>

                                  <label for="sel1">Address</label>
                                  <input type="text" class="form-control" name="addr" value="{{$data->address}}"><br>


                              <label for="sel1"><span style="color:red">Responsible</span> Doc NAME and ID<span style="color:red">*</span></label><br>
                                  <input list="browsers" class="form-control" name="resposible_doc" value="{{$data->resposible_doc}}">
                                <datalist id="browsers">
                                  @foreach($therapist_data as $data_t)
                                    <option value="{{$data_t->t_id}}">{{$data_t->t_name}}
                                  @endforeach
                                </datalist><br>

                     <label >Treatment Start Date</label>
                     <input type="date" name="date" class="form-control"><br>

                                 
                               <label for="sel1">Room No</label>
                                  <input type="text" class="form-control" name="roomNo" value="{{$data->room_no}}"><br>

                                 
                               <label for="sel1">WC </label>
                                  <input type="text" class="form-control" name="wc" value="{{$data->wc}}"><br>

                                 
                               <label for="sel1">NID </label>
                                  <input type="text" class="form-control" name="nid" value="{{$data->NID}}"><br>

                                    

                     <input type="submit">


                 </form>
                     
                     <form action="{{route('patient.destroy', $data->id)}}" method="post">
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
