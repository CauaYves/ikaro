@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.instrutor.index') }}">Instrutor</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.turma.index', $turma->instrutor_id) }}">Turma</a></li>
        <li class="breadcrumb-item active" aria-current="page">Alunos da Turma</li>
      </ol>
    </nav><br>

    <form action="{{ route('admin.alunos_turma.gravar') }}" method="post">
      {{ csrf_field() }}
      @include('admin.alunos_turma._form')
      <br>
      <button type="submit" class="btn btn-outline-success btn-lg">
        <i class="far fa-save"></i> Gravar
      </button>
    </form>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Turma</th>
            <th scope="col" style="text-align: center;">Aluno</th>
            <th scope="col" style="text-align: center;">Bloqueado</th>
            <th scope="col" style="text-align: center;">Motivo do Bloqueio</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->turma->nome }}</td>
              <td style="text-align: center;">{{ $reg->aluno->nome }}</td>
              <td style="text-align: center;">{{ $reg->bloqueado }}</td>
              <td style="text-align: center;">{{ $reg->motivoBloqueio }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.alunos_turma.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.alunos_turma.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
