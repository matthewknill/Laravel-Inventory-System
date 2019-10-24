@extends('layouts.list')

@section('page-name')
    Purchase Orders
@stop

@section('navigation-buttons')
    <a class="btn btn-outline-primary" href="/">Return</a>
    <a class="btn btn-outline-secondary" href="{{ action('PurchaseOrdersController@add') }}">Add New</a>
@stop

@section('table-headings')
    <th>Order ID</th>
    <th>Issue Date</th>
    <th>Supplier</th>
    <th></th>
@stop

@section('table-rows')
    @foreach ($purchaseOrders as $purchaseOrder)
        <tr>
            <td>{{ $purchaseOrder->id }}</td>
            <td>{{ date('d/m/Y', strtotime($purchaseOrder->issue_date)) }}</td>
            <td>{{ $purchaseOrder->sup_name }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ action('PurchaseOrdersController@edit', [$purchaseOrder->id]) }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ action('PurchaseOrdersController@delete', [$purchaseOrder->id]) }}" onclick="return confirm('Are you sure you would like to delete the {{ $purchaseOrder->name }} purchaseOrder?')" class="btn btn-outline-danger">Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
@stop
