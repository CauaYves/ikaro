<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro da Graduação</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>Graduação</label>
        <input type="text" name="nomeGraduacao" class="form-control" value="{{ !empty($registro->nomeGraduacao) ? $registro->nomeGraduacao : '' }}" required autofocus>
      </div>

      <div class="col">
        <label>Corpo da Faixa</label>
        <select class="custom-select" required name="corpoFaixa">
          <option value="">Escolha uma opção...</option>
            @foreach ($cor as $key => $c)
              <option value="{{ $c->nome }}" class="{{ $c->nome }}" {{ isset($registro->corpoFaixa) && $registro->corpoFaixa == $c->nome ? 'selected' : ''}}>{{ $c->nome }}</option>
            @endforeach
        </select>
      </div>

      <div class="col">
        <label>Corpo da Faixa</label>
        <select class="custom-select" required name="pontaFaixa">
          <option value="">Escolha uma opção...</option>
            @foreach ($cor as $key => $c)
              <option value="{{ $c->nome }}" class="{{ $c->nome }}" {{ isset($registro->pontaFaixa) && $registro->pontaFaixa == $c->nome ? 'selected' : ''}}>{{ $c->nome }}</option>
            @endforeach
        </select>
      </div>
    </div>

  </div>
</div>
