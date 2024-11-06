@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.campeonato.index') }}">Campenato</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.inscricao.index', $campeonato_id) }}">Inscrição</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.resultado.index', $campeonato_id) }}">Resultado</a></li>
        <li class="breadcrumb-item active" aria-current="page">Campeão Por Categoria</li>
      </ol>
    </nav><br>
    <form action="{{ route('admin.resultado.listaCampecaoPorCategoria', $campeonato_id) }}" method="get">
      @include('admin.resultado._form_categoria_peso_faixa_idade')
      <br>
      <button type="submit" class="btn btn-outline-warning btn-lg" formtarget="_blank"><i class="fas fa-list"></i> Listar</button>
    </form>
    <br><br>

    {{-- <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;" class="text-white">Atleta / Graduação / Categoria</th>
            <th scope="col" style="text-align: center;" class="text-white">Academia</th>
            <th scope="col" style="text-align: center;" class="text-white">Modalidade</th>
            <th scope="col" style="text-align: center;" class="text-white">Classicação</th>
            <th scope="col" style="text-align: center;" class="text-white">Confronto</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $reg->atleta }} -
                <a class="badge {{ $reg->corpoFaixa }} text_shadow">0</a>
                <a class="badge {{ $reg->pontaFaixa }} text_shadow">0</a>
                - {{ $reg->categoria }}</td>
                <td style="text-align: center;">{{ $reg->academia }} </td>
                <td style="text-align: center;">{{ $reg->modalidade }} </td>
                @if ($reg->classificacao == '1')
                  <td style="text-align: center;">Campeão</td>
                @else
                  <td style="text-align: center;">Vice Campeão</td>
                @endif
                @if ($reg->tipoConfronto == 'luta')
                  <td style="text-align: center;">Luta</td>
                @else
                  <td style="text-align: center;">W.O</td>
                @endif
              <td style="text-align: center;">
                <a href="{{ route('admin.resultado.deletar', $reg->resultado_id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div> --}}
  </div>

@endsection
