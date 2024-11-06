<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro da Academia</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ !empty($registro->nome) ? $registro->nome : '' }}" required autofocus>
      </div>
    </div>

  </div>
</div>
