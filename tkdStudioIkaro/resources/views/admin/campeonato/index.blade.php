@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Torneio</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.campeonato.salvar') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Nome</th>
            <th scope="col" style="text-align: center;">Data do Torneio</th>
            <th scope="col" style="text-align: center;">Status</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            @if ($reg->statusCampeonato == 'aberto')
              <tr>
                <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td style="text-align: center;" class="text-success">{{ $reg->nome }}</td>
                <td style="text-align: center;" class="text-success">{{ $reg->diaCampeonato }}</td>
                <td style="text-align: center;" class="text-success">{{ $reg->statusCampeonato }}</td>
                <td style="text-align: center;" class="text-success">
                  <a href="{{ route('admin.campeonato.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                  <a href="{{ route('admin.modalidade.index', $reg->id) }}" class="btn btn-outline-dark"><i class="far fa-keyboard"></i>  Modalidade</a>
                  <a href="{{ route('admin.inscricao.index', $reg->id) }}" class="btn btn-outline-success"><i class="far fa-keyboard"></i>  Inscrição</a>
                  <a href="{{ route('admin.campeonato.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
                </td>
              </tr>
            @else
              <tr>
                <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td style="text-align: center;" class="text-danger">{{ $reg->nome }}</td>
                <td style="text-align: center;" class="text-danger">{{ $reg->diaCampeonato }}</td>
                <td style="text-align: center;" class="text-danger">{{ $reg->statusCampeonato }}</td>
                {{-- <td style="text-align: center;" class="text-danger">
                  <a href="{{ route('admin.campeonato.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                  <a href="{{ route('admin.modalidade.index', $reg->id) }}" class="btn btn-outline-dark"><i class="far fa-keyboard"></i>  Modalidade</a>
                  <a href="{{ route('admin.inscricao.index', $reg->id) }}" class="btn btn-outline-success"><i class="far fa-keyboard"></i>  Inscrição</a>
                  <a href="{{ route('admin.campeonato.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
                </td> --}}
              </tr>
            @endif

          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
