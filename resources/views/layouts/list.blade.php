@extends('layouts.app')

@section('content')
    <div class="position-ref">
        <div class="content">
            <div class="title m-b-md">
                @yield('page-name')
            </div>
            <div class="form-group">
                <div class="btn-group">
                    @yield('navigation-buttons')
                </div>
            </div>
            <table class="table table-sm" style="margin: 0 auto; max-width: 1000px">
                <thead>
                <tr>
                    @yield('table-headings')
                </tr>
                </thead>
                <tbody>
                    @yield('table-rows')
                </tbody>
            </table>
        </div>
    </div>
@stop
