@extends('layouts.app')

@section('content')
    <h1>Create Profile</h1>
    {!! Form::open(['action' => 'AgencyController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('agency_name', 'Company Name')}}
            {{Form::text('agency_name', '', ['class' => 'form-control', 'placeholder' => 'Company Name'])}}
        </div>    
        <div class="form-group">
            {{Form::label('agency_address', 'Address')}}
            {{Form::text('agency_address', '', ['class' => 'form-control', 'placeholder' => 'Address'])}}
        </div>
        <div class="form-group">
            {{Form::label('agency_contact', 'Contact Number')}}
            {{Form::text('agency_contact', '', ['class' => 'form-control', 'placeholder' => 'Contact Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('agency_permit', 'Business Permit Number')}}
            {{Form::text('agency_permit', '', ['class' => 'form-control', 'placeholder' => 'Business Permit Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('agency_info', 'Additional Details')}}
            {{Form::textarea('agency_info', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Additional Details'])}}
        </div>
        <div class="form-group">
            {{Form::label('agency_url', 'Website URL')}}
            {{Form::text('agency_url', '', ['class' => 'form-control', 'placeholder' => 'Website URL'])}}
        </div> 
        <div class="form-group">
            {{Form::file('agency_logo')}}
        </div>
        {{Form::hidden('agency_status', 'Pending')}} 
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/agencies" class="btn btn-primary">Cancel</a>
    {!! Form::close() !!}
@endsection
