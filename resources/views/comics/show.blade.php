@extends('layouts.main')

@section('content')

<div class="container">

    <h3 class="my-3">{{$comic->title}} <a class="btn btn-warning" href="{{route('comics.edit', $comic)}}">Edit</a></h3>

    <p><strong>{{$comic->type}}</strong></p>

    <div class="d-flex justify-content-between">

        <img class="me-4" src="{{$comic->thumb}}" alt="{{$comic->title}}">
        <div>
            <p class="description">{{$comic->description}}</p>
            <p class="text-danger">$ {{number_format($comic->price,2,',','.')}}</p>
        </div>
    </div>


</div>

@endsection
