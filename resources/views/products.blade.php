@extends('layouts.list')

@section('page-name')
    Products
@stop

@section('navigation-buttons')
    <a class="btn btn-outline-primary" href="/">Return</a>
    <a class="btn btn-outline-secondary" href="{{ action('ProductsController@add') }}">Add New</a>
@stop

@section('table-headings')
    <th>SKU</th>
    <th>Name</th>
    <th>Info</th>
    <th></th>
@stop

@section('table-rows')
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->info }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ action('ProductsController@edit', [$product->sku]) }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ action('ProductsController@delete', [$product->sku]) }}" onclick="return confirm('Are you sure you would like to delete the {{ $product->name }} product?')" class="btn btn-outline-danger">Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
@stop
