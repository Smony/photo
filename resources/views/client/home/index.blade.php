@extends('client.layouts.limitless-master')

@section('content')

<div class="container">
	<div class="row">
	template 1 {{ Auth::user() }}
	</div>
</div>

@endsection