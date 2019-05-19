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
                    <div class="row">
                      

                    <button type="button" class="btn col-sm-2" style=" padding:20px; margin: 10px;">Add Session</button>
                    <button type="button" class="btn col-sm-2" style=" padding:20px; margin: 10px;">Paymenmts</button>       
                    <button type="button" class="btn col-sm-2" style=" padding:20px; margin: 10px;">Add Rate</button>
                    <button type="button" class="btn col-sm-2" style=" padding:20px; margin: 10px;">Add Patient</button>
                    <button type="button" class="btn col-sm-2" style=" padding:20px; margin: 10px;">Add Doctor</button>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
