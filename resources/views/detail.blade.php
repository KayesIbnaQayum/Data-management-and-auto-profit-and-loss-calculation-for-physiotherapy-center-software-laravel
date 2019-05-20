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
                                <th>Total cost</th>
                                <th>Total Paid(TK)</th>
                                <th>Total calculation</th>
                                    <th>Edit</th>

                              </tr>
                            </thead>
                            <tbody>
                                        @foreach ($data as $datas)
                                <tr>
                               <td>{{ $datas->pi_id }}</td>
                                <td>{{$datas->pi_name}}</td>
                                <td>{{ $datas->rate }}</td>
                                <td>{{ $datas->paid }}</td>
                                    @php
                                        $total =  $datas->paid - $datas->rate;
                                    
                                    @endphp

                                @if($total < 0)
                                <td> <span style="background-color: red; padding:7px; color:white">{{ $total }}</span>
                                </td>
                                @else
                                <td>{{$total}} </td>
                                @endif
                            
                               <td><a class="btn btn-primary" href="{{route('fullDetail', $datas->pi_id)}}">Detail</a>
                                
                 
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
