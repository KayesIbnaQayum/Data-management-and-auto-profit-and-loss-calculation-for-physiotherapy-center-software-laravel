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
                              <label for="sel1"><span style="color:red">Doctor</span> NAME </label>
                                  <input type="text" class="form-control" name="firstname"><br>

                              <label for="sel1">Mobile No</label>
                                  <input type="text" class="form-control" name="firstname"><br>

                               <label for="sel1">profession</label>
                                  <input type="text" class="form-control" name="firstname"><br>

                                  <label for="sel1">Address</label>
                                  <input type="text" class="form-control" name="firstname"><br>                                 

                     <label >Joined Date</label>
                     <input type="date" name="bday" max="3000-12-31" 
                            min="1000-01-01" class="form-control"><br>

                                 
                               <label for="sel1">NID </label>
                                  <input type="text" class="form-control" name="firstname"><br>

                                    

                     <input type="submit">
                 </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
