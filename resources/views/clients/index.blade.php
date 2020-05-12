@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Prikaz svih klijenata</h2>
    <hr>
    
    <div class="row">
        <div class="col-md">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Ime klijenta</th>
                        <th>Prezime klijenta</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th></th>
                        @if(Auth::user()->hasRole('administrator'))
                        <th></th>
                        @endif
                    </tr>
                </thead>
                
                @foreach ($clients as $client)
                
                <tr>
                    
                    <td>{{$client->firstname}}</td>
                    <td>{{$client->lastname}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->tel}}</td>                        
                    
                    {{-- EDIT --}}      
                    <td><a href="{{route('clients.edit',$client->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                      
                        
                    {{-- DELETE --}}     
                    @if(Auth::user()->hasRole('administrator'))
                        
                        <td>        
                            {!! Form::open(['action' => ['ClientController@destroy',$client->id],'method'=>'delete']) !!}                        
                            @csrf                       
                            {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                            {!! Form::close() !!}   
                        </td>
                        
                    @endif
                        
                    </tr>                    
                    
                    @endforeach
                    
                </table>
                {{$clients->links()}}
            </div>
        </div>
        
        @endsection