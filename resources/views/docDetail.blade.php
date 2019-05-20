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
                    <form action="<?php echo $_SERVER['REQUEST_URI']?>" method="get">
                        @csrf
                        <input type="date" name="from" class="form-control" ><br>
                         <input type="date" name="to" class="form-control" ><br>
                         <input type="submit" value="submit">
                    </form>
                    <div class="row">
                         <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>Doctor ID</th>
                                <th>Doctor Name(ID)</th>
                                <th>Total money Collect</th>
                                <th>Session Date</th>
            

                              </tr>
                            </thead>
                            <tbody>
                                        @foreach ($data as $datas)
                                <tr>
                               <td>{{ $datas->d_id }}</td>
                                <td>{{$datas->d_name}}</td>
                                <td>{{ $datas->rate }}</td>
                                <td>{{ $datas->date }}</td>
                                
                      
                            
                            
                                
                 
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
