@extends('layouts/app')

@section('title')
<link rel="stylesheet" href="{{ asset('css/start.css') }}" />

@endsection

@section('content')

<section id="intro">

	<div>
		<a href="{{ url('/require') }}" class="btn">開始</a>
	</div>

</section>
@endsection