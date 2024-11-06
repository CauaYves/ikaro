@extends('layouts.app')


@section('content')

<div class="container">
	@include('layouts.mensagem')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">Contas a Receber</li>
		</ol>
	</nav>
	<div><br></div>
	@include('admin.contas_receber.form_filtro')
	<div><br></div>
	<a class="btn btn-outline-primary" href="{{ route('admin.contas_receber.adicionar') }}">Adicionar</a>
	<a class="btn btn-outline-success" href="{{ route('admin.contas_receber.index') }}">Lista Completa</a>
	<div><br></div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th style="text-align: center;" scope="col">ID</th>
					<th style="text-align: center;" scope="col">Aluno</th>
					<th style="text-align: center;" scope="col">Parcela</th>
					<th style="text-align: center;" scope="col">Nº Parcela</th>
					<th style="text-align: center;" scope="col">Vencimento</th>
					<th style="text-align: center;" scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($receber as $r)
				@if ($r->status == 1)
				<tr>
					<th class="text-success" style="text-align: center;" scope="row"><b>{{ $r->id }}</b></th>
					<td class="text-success" style="text-align: center;"><b>{{ $r->aluno }}</b></td>
					<td class="text-success" style="text-align: center;" class="dinheiro"><b>{{ $r->valorReceber }}</b></td>
					<td class="text-success" style="text-align: center;"><b>{{ $r->qnd_parcela }}</b></td>
					<td class="text-success" style="text-align: center;"><b>{{ date('d/m/Y', strtotime($r->vencimento)) }}</b></td>
					<td class="text-success" style="text-align: center;">
						<a href="{{ route('admin.contas_receber.editar', $r->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						<a href="{{ route('admin.contas_receber.deletar', $r->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_receber.baixa', $r->id) }}" class="btn btn-outline-primary">
							Baixar
						</a>
						</a>
						{{-- <a href="{{ route('admin.contas_receber.relatorio_receber', $r->id) }}" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a> --}}

						<a href="{{ route('admin.contas_receber.relatorio', $r->id) }}" target="_blank" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a>
					</td>
				</tr>
				@elseif ($hoje > $r->vencimento)
				<tr>
					<th class="text-danger" style="text-align: center;" scope="row"><b>{{ $r->id }}</b></th>
					<td class="text-danger" style="text-align: center;"><b>{{ $r->aluno }}</b></td>
					<td class="text-danger" style="text-align: center;" class="dinheiro"><b>{{ $r->valorReceber }}</b></td>
					<td class="text-danger" style="text-align: center;"><b>{{ $r->qnd_parcela }}</b></td>
					<td class="text-danger" style="text-align: center;"><b>{{ date('d/m/Y', strtotime($r->vencimento)) }}</b></td>
					<td class="text-danger" style="text-align: center;">
						<a href="{{ route('admin.contas_receber.editar', $r->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						<a href="{{ route('admin.contas_receber.deletar', $r->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_receber.baixa', $r->id) }}" class="btn btn-outline-primary">
							Baixar
						</a>
						</a>
						{{-- <a href="{{ route('admin.contas_receber.relatorio_receber', $r->id) }}" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a> --}}

						<a href="{{ route('admin.contas_receber.relatorio', $r->id) }}" target="_blank" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a>
					</td>
				</tr>
				@else
				<tr>
					<th style="text-align: center;" scope="row">{{ $r->id }}</th>
					<td style="text-align: center;">{{ $r->aluno }}</td>
					<td style="text-align: center;" class="dinheiro">{{ $r->valorReceber }}</td>
					<td style="text-align: center;">{{ $r->qnd_parcela }}</td>
					<td style="text-align: center;">{{ date('d/m/Y', strtotime($r->vencimento)) }}</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.contas_receber.editar', $r->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						<a href="{{ route('admin.contas_receber.deletar', $r->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_receber.baixa', $r->id) }}" class="btn btn-outline-primary">
							Baixar
						</a>
						</a>
						{{-- <a href="{{ route('admin.contas_receber.relatorio_receber', $r->id) }}" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a> --}}

						<a href="{{ route('admin.contas_receber.relatorio', $r->id) }}" target="_blank" class="btn btn-outline-success">
							<b>Imprimir</b>
						</a>
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection
