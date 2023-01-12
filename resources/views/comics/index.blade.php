@extends('layouts.main')

@section('content')

<div class="container">

    <h1 class="my-3">Comics</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($comics as $comic)
            <tr>
                <td>{{$comic->id}}</td>
                <td>{{$comic->title}}</td>
                <td>{{$comic->type}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('comics.show', $comic)}}" title="show"><i class="fa-regular fa-eye"></i></a>
                    <a class="btn btn-warning " href="#" title="edit"><i class="fa-solid fa-pencil"></i></a>
                    <a class="btn btn-danger " href="#" title="delete"><i class="fa-solid fa-trash"></i></a>
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
