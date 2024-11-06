@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.campeonato.index') }}">Campeonato</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.inscricao.index', $campeonato_id) }}">Inscrição</a></li>
        <li class="breadcrumb-item active" aria-current="page">Salvar</li>
      </ol>
    </nav><br>

    <form action="{{ route('admin.inscricao.gravar') }}" method="post">
      {{ csrf_field() }}
      @include('admin.inscricao._form')
      <br>
      <button type="submit" class="btn btn-outline-success btn-lg">
        <i class="far fa-save"></i> Gravar
      </button>
    </form>
  </div>
@endsection
