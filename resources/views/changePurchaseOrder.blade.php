@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                Purchase Order
            </div>
            <div style="max-width: 1000px; margin: 0 auto">
                <form action="{{ action('PurchaseOrdersController@createUpdate') }}" method="post">
                    @csrf
                    <div style="max-width: 300px; margin: 0 auto">
                        <div class="form-group">
                            <div class="btn-group">
                                <a class="btn btn-outline-primary" href="{{ action('PurchaseOrdersController@purchaseOrders') }}">Cancel</a>
                                @if ($edit)
                                    <input class="btn btn-outline-success" type="submit" value="Update">
                                @else
                                    <input class="btn btn-outline-success" type="submit" value="Add">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pur-id">SKU</label>
                            <input required type="text" class="form-control" {{ $edit ? 'readonly' : '' }}
                            name="pur-id" value="{{ $purchaseOrder->id ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="pur-date">Issue Date</label>
                            <input required type="date" class="form-control" name="pur-date" value="{{ $purchaseOrder->issue_date ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="pur-supplier">Supplier</label>

                            <select required class="form-control select2" name="pur-supplier">
                                @foreach($suppliers as $supplier)
                                    @if ($supplier->name == ($purchaseOrder->sup_name ?? ''))
                                        <option selected>{{ $supplier->name }}</option>
                                    @else
                                        <option>{{ $supplier->name }}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="pur-comment">Comments</label>
                            <textarea class="form-control" name="pur-comments">{{ $purchaseOrder->comments ?? '' }}</textarea>
                        </div>
                    </div>
                    <div id="products" class="form-group"></div>
                    <button class="btn btn-outline-secondary add-product-btn" type="button">Add Product</button>
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
    <script type="text/javascript" src="{{ asset('js/product.add.js') }}"></script>
@stop

{{-- Add current products --}}
@section('onload')
    @isset($orderProducts)
        @foreach ($orderProducts as $product)
            add_product('{{ $product->prod_sku }}', {{ $product->count }});
        @endforeach
    @endisset
@stop
