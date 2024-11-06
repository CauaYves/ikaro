<div class="card">
	<div class="card-header bg-dark text-white">
		<b>Consultar</b>
	</div>
	<div class="card-body">
		<form action="{{ route('admin.contas_receber.listar') }}" method="get">
			<div class="form-row align-items-center">

				<div class="col-sm-12 col-md-12 col-lg-6">
					<label class="sr-only"></label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Nome</div>
						</div>
						<input type="text" name="nome" class="form-control" id="cliente_autocomplete">
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6">
					<label class="sr-only"></label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">CPF</div>
						</div>
						<input type="text" name="cpf" class="form-control cpf">
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-4">
					<label class="sr-only"></label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Data Inicial</div>
						</div>
						<input type="date" name="dt_inicial" class="form-control">
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4">
					<label class="sr-only"></label>
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<div class="input-group-text">Data Final</div>
						</div>
						<input type="date" name="dt_final" class="form-control">
					</div>
				</div>
				<br>
				<div class="col-sm-12 col-md-12 col-lg-3">
					<div class="input-group mb-2">
						<div class="input-group-prepend">
							<label class="input-group-text" for="inputGroupSelect01">Status de Baixa</label>
						</div>
						<select class="custom-select" id="inputGroupSelect01" name="status">
							<option value="3" selected>tudo</option>
							<option value="0">Em aberto</option>
							<option value="1">Pago</option>
						</select>
					</div>
				</div>

				<div class="col-sm-12 col-md-12 col-lg-1 text-right">
					<button type="submit" class="btn btn-outline-warning mb-2">Listar</button>
				</div>

			</div>
		</form>
	</div>
</div>
