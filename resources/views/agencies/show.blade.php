@extends('layouts.app')

@section('content')
    <a href="/agencies" class="btn btn-default">Go Back</a>
    <h1>{{$agency->agency_name}}</h1>
    <br /><br />
    <div>    
        {!!$agency->agency_status!!}<br />
        {!!$agency->agency_name!!}<br />
        {!!$agency->agency_address!!}<br />
        {!!$agency->agency_contact!!}<br />
        {!!$agency->agency_permit!!}<br />
        {!!$agency->agency_info!!}<br />
        {!!$agency->agency_url!!}<br />
    </div>
    <br />
    <a href="/agencies/{{$agency->id}}/edit" class="btn btn-primary">Edit</a>    
    {!!Form::open(['action' => ['AgencyController@destroy', $agency->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}    
@endsection
