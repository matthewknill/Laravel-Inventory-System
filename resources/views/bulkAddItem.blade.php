@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                Bulk Add Items
            </div>
            <div style="max-width: 1500px; margin: 0 auto">
                <form action="{{ action('InventoryController@bulkCreate') }}" method="post">
                    @csrf
                    <div style="max-width: 300px; margin: 0 auto">
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
                            <label for="item-comment">Comments (for all added items)</label>
                            <textarea class="form-control" name="item-comment"></textarea>
                        </div>
                    </div>
                    <div id="items" class="form-group"></div>
                    <button class="btn btn-outline-secondary add-item-btn" type="button">Add Item</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    {{-- Create product select --}}
    <script>
    var products = "";
    @foreach($products as $prod)
        products += "<option value='{{ $prod->sku }}'>{{ $prod->name }} - {{ $prod->sku }}</option>";
    @endforeach
    </script>
    {{-- Load javascript for adding new product --}}
    <script type="text/javascript" src="{{ asset('js/inventory.add.js') }}"></script>
@stop
