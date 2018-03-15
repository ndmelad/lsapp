@extends('layouts.app')

@section('content')
    <h1>Add Deal</h1>
    {!! Form::open(['action' => 'DealsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('deal_location', 'Location')}}
            {{Form::text('deal_location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
        </div>    
        <div class="form-group">
            {{Form::label('deal_price', 'Price')}}
            {{Form::text('deal_price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div> 
        <div class="form-group">
            {{Form::label('deal_inclusions', 'Inclusions')}}
            {{Form::text('deal_inclusions', '', ['class' => 'form-control', 'placeholder' => 'Inclusions'])}}
        </div>
        <div class="form-group">
            {{Form::label('deal_startdate', 'Start Date')}}
            {{Form::text('deal_startdate', '', ['class' => 'form-control', 'placeholder' => 'Start Date'])}}
        </div>
        <div class="form-group">
            {{Form::label('deal_enddate', 'End Date')}}
            {{Form::text('deal_enddate', '', ['class' => 'form-control', 'placeholder' => 'End Date'])}}
        </div>
        <div class="form-group">
            <label class="label-control">Datetime Picker</label>
            <input type="text" class="form-control datetimepicker" value="10/05/2016">
        </div>
        <div class="form-group">
            {{Form::label('deal_img1', 'Deal Image')}}
            {{Form::file('deal_img1')}}
        </div>
        <div class="form-group">
            {{Form::label('deal_img2', 'Deal Image')}}
            {{Form::file('deal_img2')}}
        </div>
        <div class="form-group">
            {{Form::label('deal_img3', 'Deal Image')}}
            {{Form::file('deal_img3')}}
        </div>
        <div class="form-group">
            {{Form::label('deal_img4', 'Deal Image')}}
            {{Form::file('deal_img4')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        <a href="/deals" class="btn btn-primary">Cancel</a>
    {!! Form::close() !!}
@endsection
