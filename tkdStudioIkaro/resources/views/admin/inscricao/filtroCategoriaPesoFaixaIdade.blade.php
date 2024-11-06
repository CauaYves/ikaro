@extends('layouts.relatorio')

@section('content')

  <div class="container">
    {{-- @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.campeonato.index') }}">Campenato</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inscrição</li>
      </ol>
    </nav><br> --}}

    {{-- <a href="{{ route('admin.inscricao.index', $campeonato->id) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-search"></i> Lista Completa</a>
    <a href="{{ route('admin.inscricao.categoriaPesoFaixaIdade', $campeonato->id) }}" class="btn btn-outline-warning btn-lg"><i class="fas fa-search"></i> Filtar Categoria Peso Faixa Idade</a>
    <a href="{{ route('admin.inscricao.academia', $campeonato->id) }}" class="btn btn-outline-dark btn-lg"><i class="fas fa-search"></i> Filtar por Academia</a>
    <br><br>
    <form action="{{ route('admin.inscricao.filtroCategoriaPesoFaixaIdade' , $campeonato->id) }}" method="get">
      @include('admin.inscricao._form_categoria_peso_faixa_idade')
      <br>
      <button type="submit" class="btn btn-outline-warning btn-lg" formtarget="_blank"><i class="fas fa-list"></i> Listar</button>
    </form> --}}
    <center>
      <b>
        <h1>{{ $campeonato->nome }}</h1>
      </b>
    </center>
    <br><br>
    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;" class="text-white">#</th>
            <th scope="col" style="text-align: center;" class="text-white">Academia</th>
            <th scope="col" style="text-align: center;" class="text-white">Atleta</th>
            <th scope="col" style="text-align: center;" class="text-white">Peso</th>
            <th scope="col" style="text-align: center;" class="text-white">Graduação</th>
            <th scope="col" style="text-align: center;" class="text-white">Categoria</th>
            <th scope="col" style="text-align: center;" class="text-white">Modalidade</th>
            {{-- <th scope="col" style="text-align: center;">Ação</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($filtro as $key => $f)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
              <td style="text-align: center;">{{ $f->academia }}</td>
              <td style="text-align: center;">{{ $f->atleta }}</td>
              <td style="text-align: center;">{{ $f->peso }} Kg</td>
              <td style="text-align: center;">
                {{-- {{ $f->graduacao }} --}}
                <a class="badge {{ $f->corpoFaixa }} text_shadow">0</a>
                <a class="badge {{ $f->pontaFaixa }} text_shadow">0</a>
              </td>
              @if ($f->maiorPeso == 500.00)
                <td style="text-align: center;">
                  {{ $f->categoria }}
                   +{{ $f->menorPeso }} Kg
                </td>
              @else
                <td style="text-align: center;">
                  {{ $f->categoria }}
                   {{ $f->menorPeso }} /
                  {{ $f->maiorPeso }} Kg
                </td>
              @endif
              <td style="text-align: center;">{{ $f->modalidade }}</td>
              {{-- <td style="text-align: center;">
                <a href="{{ route('admin.inscricao.editar', $reg->inscricao_id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                <a href="{{ route('admin.inscricao.deletar', $f->inscricao_id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
              </td> --}}
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
