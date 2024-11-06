<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro do Torneio</b>
  </div>
  <div class="card-body">

    <div class="row">

      <div class="col-sm-12 col-md-12 col-lg-2">
        <label>Arte Marcial</label>
        <select class="custom-select" required name="artemarcial_id">
          <option value="">Escolha uma opção...</option>
          @foreach ($arteMarcial as $key => $am)
            <option value="{{ $am->id }}" {{ isset($registro->artemarcial_id) && $registro->artemarcial_id == $am->id ? 'selected' : '' }}>{{ $am->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-4">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ !empty($registro->nome) ? $registro->nome : '' }}" required autofocus>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-3">
        <label>Data do Torneio</label>
        <input type="date" name="diaCampeonato" class="form-control" value="{{ !empty($registro->diaCampeonato) ? $registro->diaCampeonato : '' }}" required autofocus>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-3">
        <label>Status do Torneio</label>
        <select class="custom-select" required name="statusCampeonato">
          <option value="aberto" {{ isset($registro->statusCampeonato) && $registro->statusCampeonato == 'aberto' ? 'selected' : '' }}>Aberto</option>
          <option value="fechado" {{ isset($registro->statusCampeonato) && $registro->statusCampeonato == 'fechado' ? 'selected' : '' }}>Fechado</option>
        </select>
      </div>

    </div>
  </div>
</div>
