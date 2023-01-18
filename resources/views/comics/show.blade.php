@extends('layouts.main')

@section('content')

<div class="container">

    <h3 class="my-3">{{$comic->title}}</h3>
    <p><strong>{{$comic->type}}</strong></p>

    <div class="d-flex justify-content-between">

        <img class="me-4" src="{{$comic->thumb}}" alt="{{$comic->title}}">
        <div>
            <p class="description">{{$comic->description}}</p>
            <p class="text-danger">{{$comic->price}}</p>
        </div>
    </div>


</div>

@endsection
