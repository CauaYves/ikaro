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

    <a href="{{ route('admin.inscricao.salvar', $campeonato->id) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <a href="{{ route('admin.inscricao.categoriaPesoFaixaIdade', $campeonato->id) }}" class="btn btn-outline-warning btn-lg"><i class="fas fa-search"></i> Filtar Categoria Peso Faixa Idade</a>
    <a href="{{ route('admin.inscricao.academia', $campeonato->id) }}" class="btn btn-outline-dark btn-lg"><i class="fas fa-search"></i> Filtar por Academia</a>
    <a href="{{ route('admin.resultado.index', $campeonato->id) }}" class="btn btn-outline-success btn-lg"><i class="fas fa-trophy"></i> Resultado</a>
    <br><br>
    <a href="{{ route('admin.inscricao.listaInscritosCategoriaLuta', $campeonato->id) }}" class="btn btn-outline-success btn-lg" target="_blank"><i class="fas fa-search"></i> Lista de Inscritos Por categoria e Luta</a>
    <a href="{{ route('admin.inscricao.listaInscritosCategoriaPoomsae', $campeonato->id) }}" class="btn btn-outline-secondary btn-lg" target="_blank"><i class="fas fa-search"></i> Lista de Inscritos Por categoria e Poomsae</a>
    <a href="{{ route('etiqueta', $campeonato->id) }}" class="btn btn-outline-info btn-lg" target="_blank"><i class="fas fa-search"></i> Etiqueta</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Atleta</th>
            <th scope="col" style="text-align: center;">Modalidade</th>
            <th scope="col" style="text-align: center;">Categoria</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->atleta }}</td>
              <td style="text-align: center;">{{ $reg->modalidade }}</td>
              <td style="text-align: center;">{{ $reg->categoria }}</td>
              <td style="text-align: center;">
                {{-- <a href="{{ route('admin.inscricao.editar', $reg->inscricao_id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a> --}}
                <a href="{{ route('admin.inscricao.deletar', $reg->inscricao_id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
