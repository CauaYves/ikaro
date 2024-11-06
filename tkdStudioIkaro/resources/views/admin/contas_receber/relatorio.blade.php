@extends('layouts.app_relatorio')


@section('content')

<div class="container">

	@foreach ($empresa as $e)
		<center><img src="{{ asset($e->logo) }}" width="900px" height="120px"></center>
		<br>
		<center><b>{{ $e->rua }}, nº {{ $e->numero }}, {{ $e->complemento }}, {{ $e->bairro }}, {{ $e->cidade }} - {{ $e->uf }}, CEP.: {{ $e->cep }}</b></center>	
		<center><b>Telefone: {{ $e->telefone }}  / Whatsapp: {{ $e->celular }}</b></center>	
		<center><b>Site: {{ $e->site }}  / E-mail: {{ $e->email }}</b></center>	
	@endforeach
	<br>
	<div class="rosa">
		<center>
			<b><i><h3>Programação de Recebimento</h3></i></b>
		</center>
	</div>

	<br>
	<div>
		<table border="1">
			<thead class="bg-dark">
				<tr height="35px">
					<th class="text-white" style="text-align: center;" scope="col" width="400px">Cliente</th>
					<th class="text-white" style="text-align: center;" scope="col" width="130px">Valor</th>
					<th class="text-white" style="text-align: center;" scope="col" width="120px">Nº Parcela</th>
					<th class="text-white" style="text-align: center;" scope="col" width="110px">Vencimento</th>
					<th class="text-white" style="text-align: center;" scope="col" width="300px">Clínica</th>
					<th class="text-white" style="text-align: center;" scope="col" width="300px">Paciênte</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($receber as $r)
				<tr height="35px">
					<td style="text-align: center;">{{ $r->cliente->nome }}</td>
					<td style="text-align: center;" class="dinheiro">{{ $r->parcela }}</td>
					<td style="text-align: center;">{{ $r->qnd_parcela }}</td>
					<td style="text-align: center;">{{ date('d/m/Y', strtotime($r->vencimento)) }}</td>
					<td style="text-align: center;"></td>
					<td style="text-align: center;"></td>
				</tr>
				@endforeach
			</tbody>

			<tfoot class="bg-dark" height="35px">
				<td class="text-white" colspan="5"><b>&nbsp &nbsp &nbsp &nbsp &nbsp Total a Pagar</b></td>
				<td class="text-white dinheiro" style="text-align: center;"	><b>{{ $total }}</b></td>
			</tfoot>
		</table>
	</div>
</div>

@endsection