<div class="card">
	<div class="card-header bg-dark text-white">
		Dados Básicos
	</div>

	<div class="card-body">
		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-3">
				<label>Academia</label>
				<select class="custom-select" required name="studio_id">
		      <option value="">Escolha uma opção...</option>
					@foreach ($studio as $key => $s)
						<option value="{{ $s->id }}" {{ isset($registro->studio_id) && $registro->studio_id == $s->id ? 'selected' : '' }}>{{ $s->nome }}</option>
					@endforeach
		    </select>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-4">
				<label>Nome</label>
				<input type="text" name="nome" class="form-control" value="{{ isset($registro->nome) ? $registro->nome : '' }}" autofocus required>
			</div>

			<div class="col">
				<label>Data de Nascimento</label>
				<input type="date" name="nascimento" class="form-control" placeholder="Last name" value="{{ isset($registro->nascimento) ? $registro->nascimento : '' }}" required>
			</div>

			<div class="col">
				<label>Sexo</label>
				<select class="custom-select" required name="sexo">
		      <option value="">Escolha uma opção...</option>
					<option value="masculino" {{ isset($registro->sexo) && $registro->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
					<option value="feminino" {{ isset($registro->sexo) && $registro->sexo == 'feminino' ? 'selected' : '' }}>Feminino</option>
		    </select>
			</div>
		</div>

		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<label>RG</label>
				<input type="text" name="rg" class="form-control" value="{{ isset($registro->rg) ? $registro->rg : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-6">
				<label>CPF</label>
				<input type="text" name="cpf" class="form-control cpf" value="{{ isset($registro->cpf) ? $registro->cpf : '' }}" >
			</div>
		</div>
	</div>
</div>
<br>
<div class="card">
	<div class="card-header bg-dark text-white">
		Endereço
	</div>

	<div class="card-body">
		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<label>Cep</label>
				<input name="cep" type="text" id="cep" class="form-control cep" size="60" onblur="pesquisacep(this.value);" value="{{ isset($registro->cep) ? $registro->cep : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-6">
				<label>Rua</label>
				<input name="rua" type="text" id="rua" class="form-control" size="60" value="{{ isset($registro->rua) ? $registro->rua : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-2">
				<label>Número</label>
				<input name="numero" type="text" class="form-control" value="{{ isset($registro->numero) ? $registro->numero : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-2">
				<label>Complemento</label>
				<input name="complemento" type="text" class="form-control" value="{{ isset($registro->complemento) ? $registro->complemento : '' }}">
			</div>
		</div>

		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-5">
				<label>Bairro</label>
				<input name="bairro" type="text" id="bairro" class="form-control" size="40" value="{{ isset($registro->bairro) ? $registro->bairro : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-5">
				<label>Cidade</label>
				<input name="cidade" type="text" id="cidade" class="form-control" size="40" value="{{ isset($registro->cidade) ? $registro->cidade : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-2">
				<label>Estado</label>
				<input name="uf" type="text" id="uf" class="form-control" size="2" value="{{ isset($registro->uf) ? $registro->uf : '' }}" >
			</div>
			<input name="ibge" type="hidden" id="ibge" class="form-control" size="8">
		</div>
	</div>
</div>
<br>

<div class="card">
	<div class="card-header bg-dark text-white">
		Dados Complementares
	</div>

	<div class="card-body">
		<div class="form-row">
			<div class="col-sm-12 col-md-12 col-lg-6">
				<label>E-mail</label>
				<input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="{{ isset($registro->email) ? $registro->email : '' }}" >
			</div>
			<div class="col-sm-12 col-md-12 col-lg-3">
				<label>Telefone</label>
				<input type="text" name="telefone" class="form-control telefone" value="{{ isset($registro->telefone) ? $registro->telefone : '' }}" >
			</div>

			<div class="col-sm-12 col-md-12 col-lg-3">
				<label>Celular</label>
				<input type="text" name="celular" class="form-control celular" value="{{ isset($registro->celular) ? $registro->celular : '' }}" >
			</div>
		</div>
	</div>
</div>
<br>

<div class="card">
	<div class="card-header bg-dark text-white">
		Upload
	</div>
	<div class="card-body">
		<div class="form-group">
			<input type="file" class="form-control-file border " name="imagem">
		</div>
	</div>
</div>
