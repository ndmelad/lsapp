@extends('layouts.app')

@section('content')
    <h1>Agencies</h1>
    @if(count($agencies) > 0)
        @foreach($agencies as $agency)
            <div class="well">
                <h3><a href="/agencies/{{$agency->id}}">{{$agency->agency_name}}</a></h3>
            </div>     
            <br />  
        @endforeach
        <br />
        {{$agencies->links()}}    
    @else
        <p>No travel agencies found.</p>
    @endif
@endsection
