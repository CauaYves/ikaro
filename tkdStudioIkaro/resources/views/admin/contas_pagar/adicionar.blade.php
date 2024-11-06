@extends('layouts.app')


@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.contas_pagar.index') }}">Contas a Pagar</a></li>
			<li class="breadcrumb-item active" aria-current="page">Adicionar</li>
		</ol>
	</nav>
	<div><br></div>
	<div class="card">
		<h5 class="card-header bg-dark text-white"><b>Contas a pagar</b></h5>
		<div class="card-body">
			<form action="{{ route('admin.contas_pagar.salvar') }}" method="post">

				{{ csrf_field() }}
				@include('admin.contas_pagar.form')
				<br>
				<button type="submit" class="btn btn-outline-primary">Gravar</button>
			</form>
		</div>
	</div>
</div>

@endsection
