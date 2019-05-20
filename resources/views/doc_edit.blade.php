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
                        <form action="{{route('doctor.update', ['id'=>$data->id])}}" method="post" class="col-sm-12">
                          @csrf
                          @method('put')
                              <label for="sel1"><span style="color:red">Doctor</span> NAME <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="docName" value="{{$data->name}}"><br>

                              <label for="sel1">Mobile No <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="mobile" value="{{$data->mobile}}"><br>

                            
                                  <label for="sel1">Address</label>
                                  <input type="text" class="form-control" name="addr" value="{{$data->address}}"><br>                                 

                     <label >Joined Date</label>
                     <input type="date" name="Joined_date" class="form-control" value="{{$data->joined}}"><br>

                                 
                               <label for="sel1">NID </label>
                                  <input type="text" class="form-control" name="nid" value="{{$data->NID}}"><br>

                                    

                     <input type="submit">

                                          <form action="{{route('doctor.destroy', ['id'=> $data->id])}}">
                      @csrf
                      @method('delete')

                      <br>
                      <br>
                      <br><input type="checkbox" name="delete" value="1"><p style="color:red">I want to delete this<p><br>
                      <input type="submit" value="Delete"> 
                    </form>
                 </form>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
