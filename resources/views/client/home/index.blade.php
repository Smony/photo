@extends('client.layouts.limitless-master')

@section('content')

<div class="container">
	<div class="row">
	user {{ Auth::user()->role }}
	</div>
</div>

@endsection