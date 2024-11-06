@extends('layouts.app')


@section('content')

<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.home.index') }}"><i class="fas fa-home"></i></a></li>
			<li class="breadcrumb-item"><a href="{{ route('admin.contas_receber.index') }}">Contas a Receber</a></li>
			<li class="breadcrumb-item active" aria-current="page">Editar</li>
		</ol>
	</nav>
	<div><br></div>
	<div class="card">
		<h5 class="card-header bg-dark text-white"><b>Contas a Receber</b></h5>
		<div class="card-body">
			<form action="{{ route('admin.contas_receber.alterar', $receber->id) }}" method="post">
				<input type="hidden" name="_method" value="put">
				{{ csrf_field() }}
				@include('admin.contas_receber.form_editar')
				<br>
				<button type="submit" class="btn btn-outline-primary">Alterar</button>
			</form>
		</div>
	</div>
</div>

@endsection
