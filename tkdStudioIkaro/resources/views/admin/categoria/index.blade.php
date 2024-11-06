@extends('layouts.app')

@section('content')

  <div class="container">
    @include('layouts.mensagem')
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.arte_marcial.index') }}">Arte Marcial</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categoria</li>
      </ol>
    </nav><br>

    <a href="{{ route('admin.categoria.salvar', $categoria_id) }}" class="btn btn-outline-primary btn-lg"><i class="fas fa-plus-circle"></i> Adicionar</a>
    <br><br>

    <div class="table-responsive">
      <table class="table table-striped table-borderless">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;">Nome</th>
            <th scope="col" style="text-align: center;">Sexo</th>
            <th scope="col" style="text-align: center;">Idade</th>
            <th scope="col" style="text-align: center;">Peso</th>
            <th scope="col" style="text-align: center;">Graduação</th>
            <th scope="col" style="text-align: center;">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            @if ($reg->sexo == 'masculino')
              <tr>
                <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td style="text-align: center;" class="text-primary">{{ $reg->nome }}</td>
                <td style="text-align: center;" class="text-primary">{{ $reg->sexo }}</td>
                <td style="text-align: center;" class="text-primary">{{ $reg->idadeMenor }} a {{ $reg->idadeMaior }} anos</td>
                <td style="text-align: center;" class="text-primary">{{ $reg->menorPeso }} a {{ $reg->maiorPeso }} Kg</td>
                @if ($reg->graduacaoMenor == 99 && $reg->graduacaoMaior == 99)
                  <td style="text-align: center;" class="text-primary">Faixa Preta</td>
                @elseif ($reg->graduacaoMenor <= 10 && $reg->graduacaoMaior == 99)
                  <td style="text-align: center;" class="text-primary">{{ $reg->graduacaoMenor }}º Gub a Faixa Preta </td>
                @else
                  <td style="text-align: center;" class="text-primary">{{ $reg->graduacaoMenor }}º a {{ $reg->graduacaoMaior }}º Gub </td>
                @endif
                <td style="text-align: center;">
                  <a href="{{ route('admin.categoria.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                  <a href="{{ route('admin.categoria.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
                </td>
              </tr>
            @else
              <tr>
                <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td style="text-align: center;" class="text-danger">{{ $reg->nome }}</td>
                <td style="text-align: center;" class="text-danger">{{ $reg->sexo }}</td>
                <td style="text-align: center;" class="text-danger">{{ $reg->idadeMenor }} a {{ $reg->idadeMaior }} anos</td>
                <td style="text-align: center;" class="text-danger">{{ $reg->menorPeso }} a {{ $reg->maiorPeso }} Kg</td>
                @if ($reg->graduacaoMenor == 99 && $reg->graduacaoMaior == 99)
                  <td style="text-align: center;" class="text-danger">Faixa Preta</td>
                @elseif ($reg->graduacaoMenor <= 10 && $reg->graduacaoMaior == 99)
                  <td style="text-align: center;" class="text-danger">{{ $reg->graduacaoMenor }}º Gub a Faixa Preta </td>
                @else
                  <td style="text-align: center;" class="text-danger">{{ $reg->graduacaoMenor }}º a {{ $reg->graduacaoMaior }}º Gub </td>
                @endif
                <td style="text-align: center;">
                  <a href="{{ route('admin.categoria.editar', $reg->id) }}" class="btn btn-outline-warning"><i class="far fa-edit"></i>  Editar</a>
                  <a href="{{ route('admin.categoria.deletar', $reg->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'><i class="far fa-trash-alt"></i>  Deletar</a>
                </td>
              </tr>
            @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
