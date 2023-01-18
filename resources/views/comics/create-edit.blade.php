@extends('layouts.main')

@section('content')

<div class="container">
    <h3>Add a new comic book</h3>
    <form action="{{route('comics.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Type the title here">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">Series</label>
            <input type="text" class="form-control" id="series" name="series" value="{{old('series')}}" placeholder="Type the series here">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}" placeholder="Type the price here">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <input type="type" class="form-control" id="type" name="type" value="{{old('type')}}" placeholder="Type the type here">
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">Image</label>
            <input type="text" class="form-control" id="thumb" name="thumb" value="{{old('thumb')}}" placeholder="Paste the image url here">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">Sale date</label>
            <input type="text" class="form-control" id="sale_date" name="sale_date" value="{{old('sale_date')}}" placeholder="yyyy-mm-dd">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea value="{{old('description')}}" name="description" placeholder="Type the description here" class="form-control" id="description" rows="3"></textarea>
        </div>
        <button class="btn btn-primary my-3" type="submit">Submit</button>
    </form>
</div>

@endsection
