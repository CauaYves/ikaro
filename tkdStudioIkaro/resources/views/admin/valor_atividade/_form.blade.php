<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro do Valor da Atividade <b class="text-warning"> - {{ $atividade->nome }}</b></b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>ID Atividade</label>
        <input type="text" name="atividade_id" class="form-control" value="{{ isset($registro->atividade_id) ? $registro->atividade_id : $atividade->id }}" readonly>
      </div>
      <div class="col">
        <label>Valor</label>
        <input type="text" name="valor" class="form-control dinheiro" value="{{ isset($registro->valor) ? $registro->valor : '' }}" required autofocus>
      </div>
      <div class="col">
        <label>Ano</label>
        @if (isset($registro->ano))
          <input type="text" name="ano" class="form-control" value="{{ $registro->ano }}" required>
        @else
          <input type="text" name="ano" class="form-control" value="{{ $ano  }}" readonly>
        @endif
      </div>
    </div>

  </div>
</div>
