@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container text-center my-auto welcome">
      <img src="{{ asset('material') }}/img/favicon.png" alt="" style="height: 100px;margin: 30px;">
      <h1 class="mb-1 ">{{ __('Bem Vindo ao Sistema Base') }}</h1>
      <h3 class="mb-5 ">
        <em>sistema de gestão empresarial</em>
      </h3>
      <!-- <img src="{{ asset('material') }}/icons/fogo.png" width=60 height=40> -->
@endsection
