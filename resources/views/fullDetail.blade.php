@extends('layouts.app')

@section('content')

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
                                <th>patient. ID</th>
                                <th>Patient Name(ID)</th>
                                <th>Doctor ID</th>
                                <th>Doctor Name</th>
                                <th>Session ID</th>
                                <th>Session Date</th>
                                    <th>Session Time</th>
                                    <th>Rate</th>

                              </tr>
                            </thead>
                            <tbody>
                                        @foreach ($data as $datas)
                                <tr>
                               <td>{{ $datas->p_id }}</td>
                                <td>{{$datas->p_name}}</td>
                                <td>{{ $datas->d_id }}</td>
                                <td>{{ $datas->d_name }}</td>
                                <td>{{ $datas->session_id }}</td>
                                  <td>{{ $datas->date }}</td>
                                  <td>{{ $datas->session_time }}</td>
                                  <td>{{ $datas->rate }}</td>
                            
                              
                                
                 
                            </tr>
                        @endforeach
               
                 
               
                            </tbody>
                          </table>

                                  


                   

                    </div>

                </div>
            </div>
        </div>

</div>
@endsection
