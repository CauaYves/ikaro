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
        <label>Academia</label>
        <select class="custom-select" required name="academia_id" autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($academia as $key => $a)
            <option value="{{ $a->id }}">{{ $a->nome }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
