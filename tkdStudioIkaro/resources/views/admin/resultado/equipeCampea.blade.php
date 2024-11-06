@extends('layouts.relatorio')

@section('content')
  <div class="container">
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
            <th scope="col" style="text-align: center;">#</th>
            <th scope="col" style="text-align: center;" class="text-white">Academia</th>
            <th scope="col" style="text-align: center;" class="text-white">Pontuação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($registros as $key => $reg)
            <tr>
              <th scope="row" style="text-align: center;">{{ ++$key }}</th>
                <td style="text-align: center;">{{ $reg->academia }} </td>
                <td style="text-align: center;">{{ $reg->pontuacao }} </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection
