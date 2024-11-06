<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro da turma</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <label>ID Instrutor</label>
        <input type="text" name="instrutor_id" class="form-control" value="{{ isset($registro->instrutor_id) ? $registro->instrutor_id : $instrutor->id }}" readonly>
      </div>
      <div class="col">
        <label>Atividade</label>
        <select class="custom-select" name="atividade_id" required autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($atividade as $key => $a)
            <option value="{{ $a->id }}" {{ isset($registro->atividade_id) && $registro->atividade_id == $a->id ? 'selected' : '' }}>{{ $a->nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ isset($registro->nome) ? $registro->nome : '' }}" required>
      </div>
    </div>
  </div>
</div>
