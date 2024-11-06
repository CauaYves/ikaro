@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Studio</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.studio.salvar') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Nome</th>
            <th scope="col" style="text-align: center;">Telefone</th>
            <th scope="col" style="text-align: center;">Celular</th>
            <th scope="col" style="text-align: center;">E-mail</th>
            <th scope="col" style="text-align: center;">Site</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">
                {{ $reg->nome }}
              </td>
              <td style="text-align: center;">{{ $reg->telefone }}</td>
              <td style="text-align: center;">{{ $reg->celular }}</td>
              <td style="text-align: center;">{{ $reg->email }}</td>
              <td style="text-align: center;">{{ $reg->site }}</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.studio.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.studio.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
