@extends('layouts.layout')
@section('titulo', 'Home')
@section('content')
    @guest
        <h1>Bienvenido <strong>a Mundo animal</strong></h1>
    @else
        <h1>Bienvenido {{ $nombre }}<strong>a Mundo animal</strong></h1>
    @endguest
@endsection
