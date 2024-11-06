<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Inscrição do Atleta no {{ $campeonato->nome }}</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-3">
				<label>ID Torneio</label>
				<input type="text" name="campeonato_id" class="form-control" value="{{ $campeonato_id }}" readonly>
			</div>

      <div class="col-sm-12 col-md-12 col-lg-6">
        <label>Atleta</label>
        <select class="custom-select" required name="atleta_id" autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($atleta as $key => $a)
            <option value="{{ $a->id }}">{{ $a->nome }}</option>
          @endforeach
        </select>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-3">
        <label>Modalidade</label>
        <select class="custom-select" required name="modalidade_id">
          <option value="">Escolha uma opção...</option>
          @foreach ($modalidade as $key => $m)
            <option value="{{ $m->id }}">{{ $m->nome }}</option>
          @endforeach
        </select>
      </div>
    </div>

  </div>
</div>
