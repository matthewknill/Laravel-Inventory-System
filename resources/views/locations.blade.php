@extends('layouts.list')

@section('page-name')
    Location
@stop

@section('navigation-buttons')
    <a class="btn btn-outline-primary" href="/">Return</a>
    <a class="btn btn-outline-secondary" href="{{ action('LocationsController@add') }}">Add New</a>
@stop

@section('table-headings')
    <th>Account</th>
    {{-- TODO probably consolodate --}}
    <th>Address</th>
    <th>Comments</th>
    <th></th>
@stop

@section('table-rows')
    @foreach ($locations as $location)
        <tr>
            <td>{{ $location->account_num }}</td>
            <td>
                {{ $location->address_line1 }}
                {{ $location->address_line2 }}
                {{ $location->address_line3 }}
                {{ $location->address_line4 }}
                {{ $location->city }}
                {{ $location->state }}
                {{ $location->postal_code }}
            </td>
            <td>{{ $location->comments }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ action('LocationsController@edit', [$location->id]) }}" class="btn btn-outline-secondary">Edit</a>
                    <a href="{{ action('LocationsController@delete', [$location->id]) }}" onclick="return confirm('Are you sure you would like to delete this location?')" class="btn btn-outline-danger">Delete</a>
                </div>
            </td>
        </tr>
    @endforeach
@stop
