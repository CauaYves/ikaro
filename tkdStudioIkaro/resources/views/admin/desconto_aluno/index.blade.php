@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.aluno.index') }}">Aluno</a></li>
        <li class="breadcrumb-item active" aria-current="page">Desconto do Aluno</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.desconto_aluno.salvar', $aluno) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Atividade</th>
            <th scope="col" style="text-align: center;">Valor do Desconto</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->atividade->nome }}</td>
              <td style="text-align: center;">R$ {{ number_format($reg->valor, 2, ',', '.') }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.desconto_aluno.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.desconto_aluno.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
