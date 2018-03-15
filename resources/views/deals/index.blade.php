@extends('layouts.app')

@section('content')
    <h1>Deals</h1>
    @if(count($deals) > 0)
        @foreach($deals as $deal)
            <div class="well">
                <h3><a href="/deals/{{$deal->id}}">{{$deal->deal_location}}</a></h3>
            </div>     
            <br />  
        @endforeach
        <br />
        {{$deals->links()}}    
    @else
        <p>No deals found.</p>
    @endif
@endsection
