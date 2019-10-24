@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                Inventory
            </div>
            <div style="max-width: 300px; margin: 0 auto">
                <form action="{{ action('InventoryController@createUpdate') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary" href="{{ action('InventoryController@inventory') }}">Cancel</a>
                        @if ($edit)
                            <input class="btn btn-outline-success" type="submit" value="Update">
                        @else
                            <input class="btn btn-outline-success" type="submit" value="Add">
                        @endif
                    </div>
                </div>
                <input type="hidden" name="item-id" value="{{ $item->id ?? '' }}">
                <div class="form-group">
                    <label for="item-order">Order ID</label>
                    <select name="item-order" class='select2 clean form-control' required>
                        @foreach ($purchaseOrder as $po)
                            @if ($edit)
                                <option {{ $po->id == $item->order_id ? 'selected' : '' }} value="{{ $po->id }}">{{ $po->id }}</option>
                            @else
                                <option value="{{ $po->id }}">{{ $po->id }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="item-product">Product</label>
                    <select name="item-product" class='select2 clean form-control' required>
                        @foreach ($products as $prod)
                            @if ($edit)
                                <option {{ $prod->sku == $item->prod_sku ? 'selected' : '' }} value='{{ $prod->sku }}'>{{ $prod->name }} - {{ $prod->sku }}</option>
                            @else
                                <option value='{{ $prod->sku }}'>{{ $prod->name }} - {{ $prod->sku }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="item-serial">Serial</label>
                    <input required type="text" class="form-control" name="item-serial" value="{{ $item->serial ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="item-mac">MAC</label>
                    <input type="text" class="form-control" name="item-mac" value="{{ $item->mac ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="item-comments">Comments</label>
                    <textarea class="form-control" name="item-comments" >{{ $item->comments ?? '' }}</textarea>
                </div>
            </form>
            </div>
                <table class="table table-sm" style="margin: 0 auto; max-width: 500px">
                    <thead>
                    <tr>
                        <th style="min-width: 200px">Move Date</th>
                        <th>Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($locationHistory as $location)
                        <tr>
                            <td>{{ $location->move_date }}</td>
                            <td>
                                {{ $location->address_line1 }}
                                {{ $location->address_line2 }}
                                {{ $location->address_line3 }}
                                {{ $location->address_line4 }}
                                {{ $location->city }}
                                {{ $location->state }}
                                {{ $location->postal_code }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop
