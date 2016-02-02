@extends('client.layouts.limitless-master')

@section('content')

    <div class="container">
        <div class="row">
            master {{ Auth::user() }}
        </div>
    </div>

@endsection