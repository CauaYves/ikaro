@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instrutor.index') }}">Instrutor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.turma.index', $instrutor) }}">Turma</a></li>
        <li class="breadcrumb-item active" aria-current="page">horários da Turma</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.turma.salvar', $instrutor) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Instrutor</th>
            <th scope="col" style="text-align: center;">Atividade</th>
            <th scope="col" style="text-align: center;">Turma</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->instrutor->nome }}</td>
              <td style="text-align: center;">{{ $reg->atividade->nome }}</td>
              <td style="text-align: center;">{{ $reg->nome }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.turma.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.horarios_turma.index', $reg->id) }}" class="btn btn-outline-dark"><i class="far fa-clock"></i>  Horário</a>
                <a href="{{ route('admin.alunos_turma.index', $reg->id) }}" class="btn btn-outline-success"><i class="far fa-user"></i>  Alunos</a>
                <a href="{{ route('admin.turma.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
