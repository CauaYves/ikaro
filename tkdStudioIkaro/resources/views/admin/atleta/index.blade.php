@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page">Atleta</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.atleta.salvar') }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Atleta</th>
            <th scope="col" style="text-align: center;">Academia</th>
            <th scope="col" style="text-align: center;">Graduação</th>
            <th scope="col" style="text-align: center;">Idade / Peso</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">
                {{-- <img src="{{ asset($reg->imagem) }}" alt="..." class="rounded-circle" width="75px" height="75px"> --}}
                 {{ $reg->atleta }}
              </td>
              <td style="text-align: center;">{{ $reg->academina }}</td>
              <td style="text-align: center;">
                {{-- {{ $reg->graduacao }} --}}
                <a class="badge {{ $reg->corpoFaixa }} text_shadow">0</a>
                <a class="badge {{ $reg->pontaFaixa }} text_shadow">0</a>
              </td>
              <td style="text-align: center;">{{ $reg->idade }} anos / {{ $reg->peso }} Kg</td>
              <td style="text-align: center;">
                <a href="{{ route('admin.atleta.editar', $reg->atleta_id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.atleta.deletar', $reg->atleta_id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
