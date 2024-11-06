<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Filtrar</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
				<label>ID Torneio</label>
				<input type="text" name="campeonato_id" class="form-control" value="{{ $campeonato->id }}" readonly>
			</div>

      <div class="col">
        <label>Categoria</label>
        <select class="custom-select" name="categoria" autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($categoria as $key => $c)
            <option value="{{ $c->nome }}">{{ $c->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="col">
        <label>Sexo</label>
        <select class="custom-select" name="sexo" >
          <option value="">Escolha uma opção...</option>
          <option value="masculino">Masculino</option>
          <option value="feminino">feminino</option>
        </select>
      </div>

      <div class="col">
        <label>Menor Peso</label>
        <input type="text" name="menorPeso" class="form-control" placeholder="Ex.: 40">
      </div>

      <div class="col">
        <label>Maior Peso</label>
        <input type="text" name="maiorPeso" class="form-control" placeholder="Ex.: 80">
      </div>
    </div>
    <div class="row">
      <div class="col">
        <label>Menor Graduação</label>
        <input type="text" name="graduacaoMenor" class="form-control" placeholder="Ex: 10">
      </div>

      <div class="col">
        <label>Maior Graduação</label>
        <input type="text" name="graduacaoMaior" class="form-control" placeholder="Ex: 4">
      </div>

      <div class="col">
        <label>Menor Idade</label>
        <input type="text" name="idadeMenor" class="form-control" placeholder="Ex: 4">
      </div>

      <div class="col">
        <label>Maior Idade</label>
        <input type="text" name="idadeMaior" class="form-control" placeholder="Ex: 4">
      </div>

      <div class="col">
        <label>Modalidade</label>
        <select class="custom-select" name="modalidade">
          <option value="">Escolha uma opção...</option>
          @foreach ($modalidade as $key => $m)
            <option value="{{ $m->nome }}">{{ $m->nome }}</option>
          @endforeach
        </select>
      </div>

    </div>
  </div>
</div>
