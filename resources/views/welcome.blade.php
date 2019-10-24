@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <img src="{{ asset('img/inventory-management.png') }}" style="max-width: 500px; width: 100%">

            <div class="title m-b-md">
                Inventory System
            </div>
            @if (!Auth::guest())
                <div class="links">
                    <a href="product">Products</a>
                    <a href="location">Locations</a>
                    <a href="inventory">Inventory</a>
                    <a href="purchaseOrder">Purchase Orders</a>
                </div>
            @endif
        </div>
    </div>
@stop
