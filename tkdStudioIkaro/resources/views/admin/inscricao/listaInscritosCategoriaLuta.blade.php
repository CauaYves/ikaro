@extends('layouts.relatorio')

@section('content')

  <div class="container">
    <center>
      <b>
        <h1>{{ $campeonato->nome }}</h1>
      </b>
    </center>
    <br><br>
    @foreach ($categoria as $key => $c)
      <div class="card">
        <div class="card-header">
          {{ $c->categoria }}
          @if ($c->maiorPeso == 500.00)
               +{{ $c->menorPeso }} Kg
          @else
              -{{ $c->maiorPeso }} Kg
          @endif
           {{ $c->sexo }}
           @if ($c->graduacaoMenor == -99)
             Dan /
           @else
             {{ $c->graduacaoMenor }}º Gub /
           @endif
           @if ($c->graduacaoMaior == -99)
             Dan
           @else
             {{ $c->graduacaoMaior }}º Gub
           @endif
        </div>
        <div class="card-body">
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
                </tr>
              </thead>
              <tbody>
                @foreach ($inscricao as $key => $i)
                  @if ($c->categoria_id == $i->categoria_id && $c->modalidade_id == $i->modalidade_id)
                    <tr>
                      <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                      <td style="text-align: center;">{{ $i->academia }}</td>
                      <td style="text-align: center;">{{ $i->atleta }}</td>
                      <td style="text-align: center;">{{ $i->peso }} Kg</td>
                      <td style="text-align: center;">
                        <a class="badge {{ $i->corpoFaixa }} text_shadow">0</a>
                        <a class="badge {{ $i->pontaFaixa }} text_shadow">0</a>
                      </td>
                      @if ($i->maiorPeso == 500.00)
                        <td style="text-align: center;">
                          {{ $i->categoria }}
                           +{{ $i->menorPeso }} Kg
                        </td>
                      @else
                        <td style="text-align: center;">
                          {{ $i->categoria }}
                           {{ $i->menorPeso }} /
                          {{ $i->maiorPeso }} Kg
                        </td>
                      @endif
                      <td style="text-align: center;">{{ $i->modalidade }}</td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <br>
    @endforeach

  </div>

@endsection
