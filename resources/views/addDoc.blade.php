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
                        <form action="{{route('doctor.store')}}" method="post" class="col-sm-12">
                          @csrf
                              <label for="sel1"><span style="color:red">Doctor</span> NAME <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="docName"><br>

                              <label for="sel1">Mobile No <span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="mobile"><br>

                               <label for="sel1">profession<span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="prof"><br>

                                  <label for="sel1">Address<span style="color:red">*</span></label>
                                  <input type="text" class="form-control" name="addr"><br>                                 

                     <label >Joined Date<span style="color:red">*</span></label>
                     <input type="date" name="Joined_date" class="form-control"><br>

                                 
                               <label for="sel1">NID </label>
                                  <input type="text" class="form-control" name="nid"><br>

                                    

                     <input type="submit">
                 </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
