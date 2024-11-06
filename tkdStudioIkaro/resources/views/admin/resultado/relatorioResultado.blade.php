@extends('layouts.relatorio')

@section('content')

  <div class="container">
    <center>
      <b>
        <h1>{{ $campeonato->nome }}</h1>
      </b>
    </center>
    <br><br>

    @foreach ($academia as $key => $a)
      <div class="card">
        <h5 class="card-header">{{ $a->academia }}</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead class="thead-dark">
                <tr>
                  <th scope="col" style="text-align: center;">#</th>
                  <th scope="col" style="text-align: center;" class="text-white">Atleta / Graduação / Categoria</th>
                  {{-- <th scope="col" style="text-align: center;" class="text-white">Academia</th> --}}
                  <th scope="col" style="text-align: center;" class="text-white">Modalidade</th>
                  <th scope="col" style="text-align: center;" class="text-white">Classicação</th>
                  <th scope="col" style="text-align: center;" class="text-white">Confronto</th>
                  <th scope="col" style="text-align: center;" class="text-white">Pontos</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($registros as $key => $reg)
                  @if ($a->academia_id == $reg->academia_id)
                    <tr>
                      <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                      <td style="text-align: center;">{{ $reg->atleta }} -
                        <a class="badge {{ $reg->corpoFaixa }} text_shadow">0</a>
                        <a class="badge {{ $reg->pontaFaixa }} text_shadow">0</a>
                        - {{ $reg->categoria }}</td>
                        {{-- <td style="text-align: center;">{{ $reg->academia }} </td> --}}
                        <td style="text-align: center;">{{ $reg->modalidade }} </td>
                        @if ($reg->classificacao == '1')
                          <td style="text-align: center;">Campeão</td>
                        @elseif ($reg->classificacao == '2')
                          <td style="text-align: center;">Vice Campeão</td>
                        @elseif ($reg->classificacao == '3')
                          <td style="text-align: center;">3º Colocado</td>
                        @endif
                        @if ($reg->tipoConfronto == 'luta')
                          <td style="text-align: center;">Luta</td>
                        @elseif ($reg->tipoConfronto == 'WO')
                          <td style="text-align: center;">W.O</td>
                        @else
                          <td style="text-align: center;">Poomsae</td>
                        @endif
                        <td style="text-align: center;">{{ $reg->pontuacao }} </td>
                    </tr>
                  @endif

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer text-right text-dark">
          <h4><b>Total de Pontos: {{ $a->pontuacao }}</b></h4>
        </div>
      </div>
      <br>
    @endforeach


  </div>

@endsection
