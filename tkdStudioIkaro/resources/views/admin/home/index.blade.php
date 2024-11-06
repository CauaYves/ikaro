@extends('layouts.app')

@section('content')

  <div class="container">
    <center><p class="text-monospace"><h3>Olá {{ Auth::user()->name }}! Seja bem vindo! </h3></p></center>
  </div>

@endsection
