@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                         <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>S. ID</th>
                                <th>Patient Name(ID)</th>
                                <th>Therapist Name(ID)</th>
                                <th>Rate</th>
                                <th>Date</th>
                                <th>Session time</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            @foreach ($data as $datas)
                              <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->patient_id}}</td>
                                <td>{{ $datas->therapist_id}}</td>
                                <td>{{ $datas->rate}}</td>
                                <td>{{ $datas->session_date}}</td>
                                 <td>{{ $datas->session_time}}</td>
                              </tr>
                                
                            @endforeach
                 
               
                            </tbody>
                          </table>





                   

                        {{ $data->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
