@extends('layouts.relatorio')

@section('content')


<div class="row">
  @foreach ($registros as $item)
  <div class="auto fontSize">
    <div class="card">
      <div class="card-body">
        <div class="auto">
          <span style="font-weight: 900;">Nome: </span>{{ $item->atleta }} &nbsp; &nbsp; &nbsp; &nbsp;
          <span style="font-weight: 900;">Academia: </span>{{ $item->academia }} &nbsp;
        </div>
        <div class="auto">
          <span style="font-weight: 900;">Sexo: </span>{{ $item->sexo }} &nbsp; &nbsp; &nbsp; &nbsp;
          <span style="font-weight: 900;">Idade: </span>{{ $item->idade }} anos &nbsp; &nbsp; &nbsp; &nbsp;
          <span style="font-weight: 900;">Peso: </span>{{ $item->peso }} Kg &nbsp; &nbsp; &nbsp; &nbsp;
        </div>
        <div class="auto">
          <span style="font-weight: 900;">Graduação: </span>{{ $item->nomeGraduacao }} ( <a class="badge {{ $item->corpoFaixa }} text_shadow">0</a>  <a class="badge {{ $item->pontaFaixa }} text_shadow">0</a> ) &nbsp; &nbsp; &nbsp; &nbsp;
          <span style="font-weight: 900;">Categoria: </span>{{ $item->categoria }} &nbsp; &nbsp; &nbsp; &nbsp;
          <span style="font-weight: 900;">Modalidade: </span>{{ $item->modalidade }} &nbsp; &nbsp; &nbsp; &nbsp;
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>


@endsection