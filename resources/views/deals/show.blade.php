@extends('layouts.app')

@section('content')
    <a href="/deals" class="btn btn-default">Go Back</a>
    <h1>{{$deal->deal_location}}</h1>
    <br /><br />
    <div>
        {!!$deal->deal_price!!}<br />
        {!!$deal->deal_inclusions!!}<br />
        {!!$deal->deal_startdate!!}<br />
        {!!$deal->deal_enddate!!}<br />
    </div>
    <br />
    <a href="/deals/{{$deal->id}}/edit" class="btn btn-primary">Edit</a>    
    {!!Form::open(['action' => ['DealsController@destroy', $deal->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close()!!}
@endsection
