@extends('backend.master')
@section('content')
<div class="container">
    <form action="{{ route('backend.product.store') }}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="" aria-describedby="helpId" placeholder="Enter product name">
            <p class="form-text text-danger mt-3">
                @error('name')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Desc</label>
            <input type="text" class="form-control" name="desc" id="" aria-describedby="helpId" placeholder="Enter product desc">
            <p class="form-text text-danger mt-3">
                @error('desc')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" id="" aria-describedby="helpId" placeholder="Enter product quantity">
            <p class="form-text text-danger mt-3">
                @error('quantity')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="" aria-describedby="helpId" placeholder="Enter product price">
            <p class="form-text text-danger mt-3">
                @error('price')
                {{ $message }}
                @enderror
            </p>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="" aria-describedby="helpId" placeholder="Enter product image">
            <p class="form-text text-danger mt-3">
                @error('image')
                {{ $message }}
                @enderror
            </p>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
