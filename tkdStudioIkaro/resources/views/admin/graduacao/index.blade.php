@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Graduação</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.graduacao.salvar') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Nome da Graduação</th>
            <th scope="col" style="text-align: center;">Cor do Corpo da Faixa</th>
            <th scope="col" style="text-align: center;">Cor da Ponta da Faixa</th>
            <th scope="col" style="text-align: center;">Nome da Graduação</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->nomeGraduacao }}</td>
              <td style="text-align: center;" class="{{ $reg->corpoFaixa }}">{{ $reg->corpoFaixa }}</td>
              <td style="text-align: center;" class="{{ $reg->pontaFaixa }}">{{ $reg->pontaFaixa }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.graduacao.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.graduacao.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
