@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.campeonato.index') }}">Campenato</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inscrição</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.inscricao.index', $campeonato->id) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-search"></i> Lista Completa</a>
    <a href="{{ route('admin.inscricao.categoriaPesoFaixaIdade', $campeonato->id) }}" class="btn btn-outline-warning btn-lg"><i class="fas fa-search"></i> Filtar Categoria Peso Faixa Idade</a>
    <a href="{{ route('admin.inscricao.academia', $campeonato->id) }}" class="btn btn-outline-dark btn-lg"><i class="fas fa-search"></i> Filtar por Academia</a>
    <br><br>
    <form action="{{ route('admin.inscricao.filtroAcademia', $campeonato->id) }}" method="get">
      @include('admin.inscricao._form_academia')
      <br>
      <button type="submit" class="btn btn-outline-warning btn-lg" formtarget="_blank"><i class="fas fa-list"></i> Listar</button>
    </form>
    <br><br>
  </div>

@endsection
