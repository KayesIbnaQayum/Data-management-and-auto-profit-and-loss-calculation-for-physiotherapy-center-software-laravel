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
                              <label for="sel1"><span style="color:red">Patient</span> NAME and ID</label><br>
                                  <input list="browsers" class="form-control" name="browser">
                                <datalist id="browsers">
                                  <option value="Internet Explorer">
                                  <option value="Firefox">
                                  <option value="Chrome">
                                  <option value="Opera">
                                  <option value="Safari">
                                </datalist><br>


                    <label >Paid</label>    
                     <input type="text" class="form-control" name="paid"><br>            

                     <input type="submit">
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
