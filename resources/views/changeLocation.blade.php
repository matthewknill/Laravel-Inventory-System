@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                Locations
            </div>
            <div style="max-width: 300px; margin: 0 auto">
                <form action="{{ action('LocationsController@createUpdate') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="btn-group">
                        <a class="btn btn-outline-primary" href="{{ action('LocationsController@locations') }}">Cancel</a>
                        @if ($edit)
                            <input class="btn btn-outline-success" type="submit" value="Update">
                        @else
                            <input class="btn btn-outline-success" type="submit" value="Add">
                        @endif
                    </div>
                </div>
                <input type="hidden" name="item-id" value="{{ $location->id ?? '' }}">
                <div class="form-group">
                    <label for="loc-acc">Account</label>
                    <input required type="text" class="form-control" name="loc-acc" value="{{ $location->account_num ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="loc-adr">Address</label>
                    <input required type="text" class="form-control" name="loc-adr1" value="{{ $location->address_line1 ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="loc-city">City</label>
                    <input required type="text" class="form-control" name="loc-city" value="{{ $location->city ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="loc-post">Post Code</label>
                    <input required type="text" class="form-control" name="loc-post" value="{{ $location->postal_code ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="loc-state">State</label>
                    <input required type="text" class="form-control" name="loc-state" value="{{ $location->state ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="loc-comments">Comments</label>
                    <textarea class="form-control" name="loc-comments" >{{ $location->comments ?? '' }}</textarea>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop
