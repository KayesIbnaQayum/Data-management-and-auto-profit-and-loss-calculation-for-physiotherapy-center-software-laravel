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
                                <th>P. ID</th>
                                <th>Patient Name(ID)</th>
                                <th>mobile</th>
                                <th>profession</th>
                                <th>address</th>
                                <th>resposible_doc</th>
                                 <th>Room No</th>
                                  <th>WC</th>
                                   <th>NID</th>
                                    <th>Edit</th>

                              </tr>
                            </thead>
                            <tbody>
                              
                            @foreach ($data as $datas)
                              <tr>
                                <td>{{ $datas->id }}</td>
                                <td>{{ $datas->name}}</td>
                                <td>{{ $datas->mobile}}</td>
                                <td>{{ $datas->profession}}</td>
                                <td>{{ $datas->address}}</td>
                                 <td>{{ $datas->resposible_doc}}</td>
                                <td>{{ $datas->room_no}}</td>
                                  <td>{{ $datas->wc}}</td>
                                   <td>{{ $datas->NID}}</td>
                                 <td><button>Edit</button></td>
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
