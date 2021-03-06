@extends('layouts.master')

@section('content')

<div class="container">
    
    
    <h2>Baza uređaja</h2>

    
    <div class="row">
        <div class="col-md">
            <table class="table table-bordered table-sm table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Serijski broj</th>
                        <th>Opis</th>
                        <th></th>
                        {{-- @if(Auth::user()->hasRole('administrator'))
                        <th></th>
                        @endif --}}
                    </tr>
                </thead>
                
                @foreach ($devices as $device)
                
                <tr>
                    
                    <td>{{$device->brand}}</td>
                    <td>{{$device->model}}</td>
                    <td><small>S/N: <strong>{{$device->serial}}</strong> </small></td> 
                    <td>{{$device->description}}</td>     
                    
                     {{-- SHOW --}}      
                     <td><a href="{{route('devices.show',$device->id)}}"><button class="alert btn btn-primary btn-block">Detalji</button></a></td>                      
                        
                    
                    {{-- EDIT --}}      
                    {{-- <td><a href="{{route('devices.edit',$device->id)}}"><button class="alert btn btn-primary btn-block">Izmeni</button></a></td>                       --}}
                        
                    {{-- DELETE --}}     
                    {{-- @if(Auth::user()->hasRole('administrator'))
                        
                        <td>        
                            {!! Form::open(['route' => ['devices.destroy',$device->id],'method'=>'delete']) !!}                        
                            @csrf                       
                            {!! Form::submit('Obriši',['class'=>'alert btn btn-danger btn-block']) !!}      
                            {!! Form::close() !!}   
                        </td>
                        
                    @endif --}}
                        
                    </tr>                    
                    
                    @endforeach
                    
                </table>
                {{$devices->links()}}
            </div>
           
        </div>
      
        
        @endsection