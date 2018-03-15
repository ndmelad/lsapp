@extends('layouts.app')

@section('content')
    <h1>Edit Deal</h1>
    {!! Form::open(['action' => ['DealsController@update', $deal->id], 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
        <div class="form-group">
            {{Form::label('deal_location', 'Location')}}
            {{Form::text('deal_location', $deal->deal_location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>    
        <div class="form-group">
            {{Form::label('deal_price', 'Price')}}
            {{Form::text('deal_price', $deal->deal_price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div> 
        <div class="form-group">
            {{Form::label('deal_inclusions', 'Inclusions')}}
            {{Form::text('deal_inclusions', $deal->deal_inclusions, ['class' => 'form-control', 'placeholder' => 'Inclusions'])}}
        </div>
        <div class="form-group">
            {{Form::label('deal_startdate', 'Start Date')}}
            {{Form::text('deal_startdate', $deal->deal_startdate, ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('deal_enddate', 'End Date')}}
            {{Form::text('deal_enddate', $deal->deal_enddate, ['class' => 'form-control', 'placeholder' => 'End Date'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}} 
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/deals" class="btn btn-primary">Cancel</a>
    {!! Form::close() !!}
@endsection
