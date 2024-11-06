<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro da Modalidade</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>ID Torneio</label>
        <input type="text" name="campeonato_id" class="form-control" value="{{ !empty($registro->campeonato_id) ? $registro->campeonato_id : $campeonato->id }}" readonly>
      </div>
      <div class="col">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ !empty($registro->nome) ? $registro->nome : '' }}" required autofocus>
      </div>
    </div>

  </div>
</div>
