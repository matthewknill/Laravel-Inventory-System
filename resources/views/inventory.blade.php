@extends('layouts.list')

@section('page-name')
    Inventory
@stop

@section('navigation-buttons')
    <a class="btn btn-outline-primary" href="/">Return</a>
    <a class="btn btn-outline-secondary" href="{{ action('InventoryController@add') }}">Add</a>
    <a class="btn btn-outline-success" href="{{ action('InventoryController@bulkAdd') }}">Bulk Add</a>
@stop

@section('table-headings')
    <th>Order ID</th>
    <th>Serial</th>
    <th>MAC</th>
    <th>Product</th>
    <th>Current Location</th>
    <th></th>
@stop

@section('table-rows')
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->order_id }}</td>
            <td>{{ $item->serial }}</td>
            <td>{{ $item->mac }}</td>
            <td>{{ $item->name }}</td>
            <td>
                {{ $item->address_line1 }}
                {{ $item->address_line2 }}
                {{ $item->address_line3 }}
                {{ $item->address_line4 }}
                {{ $item->city }}
                {{ $item->state }}
                {{ $item->postal_code }}
            </td>
            <td>
                <div class="btn-group">
                    <a href="{{ action('InventoryController@edit', [$item->id]) }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ action('InventoryController@delete', [$item->id]) }}" onclick="return confirm('Are you sure you would like to delete this item?')" class="btn btn-outline-danger">Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
@stop

