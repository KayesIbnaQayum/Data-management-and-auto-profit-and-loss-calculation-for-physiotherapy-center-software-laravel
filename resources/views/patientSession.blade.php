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

                    <!--Component-->
                    @include('menu/topMenu')

                    <div class="row">
                        <form action="/action_page.php" class="col-sm-12">
                              <label for="sel1"><span style="color:red">Patient</span> NAME and ID</label>
                                  <select class="form-control" name="patient_id">
                                    <option value="20">1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                  </select><br>

                              <label for="sel1">Therapist NAME and ID</label>
                                  <select class="form-control" id="sel1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                  </select><br>


                              <label for="sel1">Session Time</label>
                                  <select class="form-control" id="sel1">
                                    <option>Morning</option>
                                    <option>Evening</option>
                                    <option>Night</option>
                                  </select><br>
                    
                     <label >Session Date</label>
                     <input type="date" name="bday" max="3000-12-31" 
                            min="1000-01-01" class="form-control"><br>

                    <label >Rate</label>    
                     <input type="text" class="form-control" name="rate"><br>

                    <label >Paid</label>    
                     <input type="text" class="form-control" name="paid"><br>            

                     <input type="submit">
                 </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
