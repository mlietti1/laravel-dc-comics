@extends('layouts.main')

@section('content')

<div class="container">
    <h3>{{$title}}</h3>

    @if ($errors->any())

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error )
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{$route}}" method="POST">
        @csrf
        @method($method)
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" @error('title') is-invalid @enderror id="title" name="title" value="{{old('title', $comic?->title)}}" placeholder="Type the title here">
            @error('title')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" @error('series') is-invalid @enderror id="series" name="series" value="{{old('series', $comic?->series)}}" placeholder="Type the series here">
            @error('series')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>
            <input type="float" class="form-control @error('price') is-invalid @enderror " value="{{old('price',$comic?->price)}}"  name="price" id="price" placeholder="00.00">
            @error('price')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="text" class="form-control" @error('type') is-invalid @enderror id="type" name="type" value="{{old('type', $comic?->type)}}" placeholder="Type the type here">
            @error('type')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Image URL</label>
            <input type="text" class="form-control @error('thumb') is-invalid @enderror " value="{{old('thumb',$comic?->thumb)}}"  name="thumb" id="thumb" placeholder="Paste the image url here">
            @error('thumb')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale date</label>
            <input type="text" class="form-control @error('sale_date') is-invalid @enderror " value="{{old('sale_date',$comic?->sale_date)}}"  name="sale_date" id="sale_date" placeholder="Type the sale date here">
            @error('sale_date')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea value="{{old('description', $comic?->description)}}" name="description" placeholder="Type the description here" class="form-control" id="description" rows="3">{{old('sale_date',$comic?->sale_date)}}</textarea>
            @error('description')
                <p class="invalid-feedback">{{$message}}</p>
            @enderror
        </div>
        <button class="btn btn-primary my-3" type="submit">Submit</button>
    </form>
</div>

@endsection
