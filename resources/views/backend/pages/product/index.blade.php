@extends('backend.master')
@section('content')
<a href="{{ route('backend.product.create') }}" class="btn btn-primary">Create Product</a>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
            <tr class="">
                <td scope="row">{{ $item['id'] }}</td>
                <td>
                    <img width="50px" src="{{ $item['image'] }}" alt="{{ $item['name'] }}">{{ $item['name'] }}
                </td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['price'] }}</td>
                <td>
                    <a href="{{ route('backend.product.edit',$item['id']) }}" class="btn btn-success">Edit</a>
                    <a href="{{ route('backend.product.destroy',$item['id']) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection