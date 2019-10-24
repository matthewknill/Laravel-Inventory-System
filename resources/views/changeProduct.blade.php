@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                Products
            </div>
            <div style="max-width: 300px; margin: 0 auto">
                <form action="{{ action('ProductsController@createUpdate') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="prod-sku">SKU</label>
                    <input required type="text" class="form-control" {{ $edit ? 'readonly' : '' }}
                           name="prod-sku" value="{{ $product->sku ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="prod-name">Name</label>
                    <input required type="text" class="form-control" name="prod-name" value="{{ $product->name ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="prod-info">Info</label>
                    <textarea class="form-control" name="prod-info" >{{ $product->info ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary" href="{{ action('ProductsController@products') }}">Cancel</a>
                        @if ($edit)
                            <input class="btn btn-outline-success" type="submit" value="Update">
                        @else
                            <input class="btn btn-outline-success" type="submit" value="Add">
                        @endif
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop
