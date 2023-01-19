@extends('layouts.main')

@section('content')
<div class="container mb-3">
    <a class="btn btn-primary" href="{{route('comics.create')}}">Add a new comic</a>
</div>
<div class="container">

    @if (session('deleted'))
        <div class="alert alert-success" role="alert">
            {{session('deleted')}}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><a href="{{route('comics.orderby', ['id', $direction])}}">ID</a></th>
                <th scope="col"><a href="{{route('comics.orderby', ['title', $direction])}}">Title</a></th>
                <th scope="col"><a href="{{route('comics.orderby', ['type', $direction])}}">Type</a></th>
                <th scope="col"><a href="{{route('comics.orderby', ['price', $direction])}}">Price</a></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
            <tr>
                <td>{{$comic->id}}</td>
                <td>{{$comic->title}}</td>
                <td>{{$comic->type}}</td>
                <td>$ {{number_format($comic->price,2,',','.')}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('comics.show', $comic->slug)}}" title="show"><i class="fa-regular fa-eye"></i></a>
                    <a class="btn btn-warning " href="{{route('comics.edit', $comic)}}" title="edit"><i class="fa-solid fa-pencil"></i></a>
                    @include('partials.form-delete')
                </td>
            </tr>
            @empty
                <h3>No comics found.</h3>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$comics->links()}}
    </div>

</div>

@endsection
