@extends('layouts/app')

@section('title')
<link rel="stylesheet" href="{{ asset('css/main.css') }}" />

@endsection

@section('content')

<div class="canvas" >
        <canvas id="mycanvas"></canvas>        
</div>

<h3>解決需求的程度</h3>
<h3>共花費成本</h3>

<script type = "text/javascript" src="{{ asset('js/main.js') }}"></script>


@endsection