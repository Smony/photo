@extends('client.layouts.limitless-master')

@section('content')

    <div class="container">
        <div class="row">
            master template {{ Auth::user() }}
        </div>
    </div>

@endsection