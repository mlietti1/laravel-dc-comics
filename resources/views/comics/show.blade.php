@extends('layouts.main')

@section('content')

<div class="container">

    <h3 class="my-3">{{$comic->title}}</h3>
    <p>{{$comic->type}}</p>
    <p>{{$comic->description}}</p>

</div>

@endsection
