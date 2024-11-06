<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro do Resultado do Torneio</b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col">
        <label>ID Campeonato</label>
        <input type="text" name="campeonato_id" class="form-control" value="{{ $campeonato_id }}" readonly>
      </div>

      <div class="col-sm-12 col-md-12 col-lg-5">
        <label>Atleta</label>
        <select class="custom-select" required name="inscricao_id" autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($atleta as $key => $a)
            <option value="{{ $a->inscricao_id }}">{{ $a->atleta }} ---/--- {{ $a->modalidade }}</option>
          @endforeach
        </select>
      </div>

      <div class="col">
        <label>Classicação</label>
        <select class="custom-select" required name="classificacao">
          <option value="">Escolha uma opção...</option>
          <option value="1">Campeão</option>
          <option value="2">Vice Campeão</option>
          <option value="3">3º Colocação</option>
        </select>
      </div>

      <div class="col">
        <label>Confronto</label>
        <select class="custom-select" required name="tipoConfronto">
          <option value="">Escolha uma opção...</option>
          <option value="luta">Luta</option>
          <option value="WO">W.O</option>
          <option value="poomsae">Poomsae</option>
        </select>
      </div>

    </div>



  </div>
</div>
