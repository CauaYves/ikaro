@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.graduacao.index') }}">Graduação</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      </ol>
    </nav><br>

    <form action="{{ route('admin.graduacao.atualizar', $registro->id) }}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="put">
      @include('admin.graduacao._form')
      <br>
      <button type="submit" class="btn btn-outline-success btn-lg">
        <i class="far fa-save"></i> Atualizar
      </button>
    </form>
  </div>
@endsection
