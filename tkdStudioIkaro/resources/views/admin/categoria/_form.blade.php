<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro da Categoria</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>ID Arte Marcial</label>
        <input type="text" name="artemarcial_id" class="form-control" value="{{ isset($registro->artemarcial_id) ? $registro->artemarcial_id : $categoria_id }}" readonly>
      </div>

      <div class="col-sm-12 col-md-2 col-lg-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ isset($registro->nome) ? $registro->nome : '' }}" required autofocus>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-3">
        <label>Sexo</label>
        <select class="custom-select" required name="sexo">
          <option value="">Escolha uma opção...</option>
          <option value="masculino" {{ isset($registro->sexo) && $registro->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
          <option value="feminino" {{ isset($registro->sexo) && $registro->sexo == 'feminino' ? 'selected' : '' }}>Feminino</option>
        </select>
      </div>

      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Menor Peso</label>
        <input type="text" name="menorPeso" class="form-control" value="{{ isset($registro->menorPeso) ? $registro->menorPeso : '' }}" required placeholder="Ex. 100.00">
      </div>

      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Maior Peso</label>
        <input type="text" name="maiorPeso" class="form-control" value="{{ isset($registro->maiorPeso) ? $registro->maiorPeso : '' }}" required placeholder="Ex. 100.00">
      </div>
    </div>

    <div class="row">

      <div class="col-sm-12 col-md-2 col-lg-3">
        <label>Menor Graduação</label>
        <input type="text" name="graduacaoMenor" class="form-control" value="{{ isset($registro->graduacaoMenor) ? $registro->graduacaoMenor : '' }}" required placeholder="Ex. 10">
      </div>

      <div class="col-sm-12 col-md-2 col-lg-3">
        <label>Maior Graduação</label>
        <input type="text" name="graduacaoMaior" class="form-control" value="{{ isset($registro->graduacaoMaior) ? $registro->graduacaoMaior : '' }}" required placeholder="Ex. 7">
      </div>

      <div class="col-sm-12 col-md-2 col-lg-3">
        <label>Menor Idade</label>
        <input type="text" name="idadeMenor" class="form-control" value="{{ isset($registro->idadeMenor) ? $registro->idadeMenor : '' }}" required placeholder="Ex. 5">
      </div>

      <div class="col-sm-12 col-md-2 col-lg-3">
        <label>Maior Idade</label>
        <input type="text" name="idadeMaior" class="form-control" value="{{ isset($registro->idadeMaior) ? $registro->idadeMaior : '' }}" required placeholder="Ex. 7">
      </div>
    </div>
  </div>
</div>
