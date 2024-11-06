@extends('layouts.app')


@section('content')

<div class="container">
	@include('layouts.mensagem')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item active" aria-current="page">Contas a Pagar</li>
		</ol>
	</nav>
	<div><br></div>
	@include('admin.contas_pagar.form_filtro')
	<div><br></div>
	<a class="btn btn-outline-primary" href="{{ route('admin.contas_pagar.adicionar') }}">Adicionar</a>
	<a class="btn btn-outline-success" href="{{ route('admin.contas_pagar.index') }}">Lista Completa</a>
	<div><br></div>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead class="thead-dark">
				<tr>
					<th style="text-align: center;" scope="col">ID</th>
					<th style="text-align: center;" scope="col">Fornecedor</th>
					<th style="text-align: center;" scope="col">Parcela</th>
					<th style="text-align: center;" scope="col">Nº Parcela</th>
					<th style="text-align: center;" scope="col">Vencimento</th>
					<th style="text-align: center;" scope="col">Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($pagar as $key => $p)
				@if ($p->status == 1)
				<tr>
					<th class="text-success" style="text-align: center;" scope="row"><b>{{ ++$key }}</b></th>
					<td class="text-success" style="text-align: center;"><b>{{ $p->fornecedor }}</b></td>
					<td class="text-success" style="text-align: center;" class="dinheiro"><b>{{ $p->parcela }}</b></td>
					<td class="text-success" style="text-align: center;"><b>{{ $p->qnd_parcela }}</b></td>
					<td class="text-success" style="text-align: center;"><b>{{ date('d/m/Y', strtotime($p->vencimento)) }}</b></td>
					<td class="text-success" style="text-align: center;">
						<a href="{{ route('admin.contas_pagar.editar', $p->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						</a>
						<a href="{{ route('admin.contas_pagar.deletar', $p->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_pagar.baixa', $p->id) }}" class="btn btn-outline-primary">
							Baixar
						</a>
					</td>
				</tr>
				@elseif ($hoje > $p->vencimento)
				<tr>
					<th class="text-danger" style="text-align: center;" scope="row"><b>{{ $p->id }}</b></th>
					<td class="text-danger" style="text-align: center;"><b>{{ $p->fornecedor }}</b></td>
					<td class="text-danger" style="text-align: center;" class="dinheiro"><b>{{ $p->parcela }}</b></td>
					<td class="text-danger" style="text-align: center;"><b>{{ $p->qnd_parcela }}</b></td>
					<td class="text-danger" style="text-align: center;"><b>{{ date('d/m/Y', strtotime($p->vencimento)) }}</b></td>
					<td class="text-danger" style="text-align: center;">
						<a href="{{ route('admin.contas_pagar.editar', $p->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						</a>
						<a href="{{ route('admin.contas_pagar.deletar', $p->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_pagar.baixa', $p->id) }}" class="btn btn-outline-primary">
							Baixar
						</a>
					</td>
				</tr>
				@else
				<tr>
					<th style="text-align: center;" scope="row">{{ $p->id }}</th>
					<td style="text-align: center;">{{ $p->fornecedor }}</td>
					<td style="text-align: center;" class="dinheiro">{{ $p->parcela }}</td>
					<td style="text-align: center;">{{ $p->qnd_parcela }}</td>
					<td style="text-align: center;">{{ date('d/m/Y', strtotime($p->vencimento)) }}</td>
					<td style="text-align: center;">
						<a href="{{ route('admin.contas_pagar.editar', $p->id) }}" class="btn btn-outline-warning">
							<b>Editar</b>
						</a>
						<a href="{{ route('admin.contas_pagar.deletar', $p->id) }}" class="btn btn-outline-danger" data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar
						</a>
						<a href="{{ route('admin.contas_pagar.baixa', $p->id) }}" class="btn btn-outline-primary">
							Baixar
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
