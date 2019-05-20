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
                                <th>Payment. ID</th>
                                <th>Patient Name(ID)</th>
                                <th>Paid(TK)</th>
                                <th>Date</th>
                                <th>Session ID</th>
                                    <th>Edit</th>

                              </tr>
                            </thead>
                            <tbody>
                              
                         @foreach ($data as $datas)
                                <tr>
                               <td>{{ $datas->id }}</td>
                                <td>{{$datas->p_name}} ({{ $datas->patient_id }})</td>
                                @if($datas->paid < 0)
                                <td> <span style="background-color: red; padding:7px; color:white">{{ $datas->paid }}</span></td>
                                @else
                                <td >{{ $datas->paid }}</td>
                                @endif

                                <td>{{ $datas->paid_date }}</td>
                                <td>{{ $datas->session_id }}</td>
                                
                               <td><a class="btn btn-primary" href="{{route('payment.edit', $datas->id)}}">Edit</a>
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
@endsection
