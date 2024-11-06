<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Adicionar aluno a turma</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <label>ID Turma</label>
        <input type="text" name="turma_id" class="form-control" value="{{ isset($registro->turma_id) ? $registro->turma_id : $turma->id }}" readonly>
      </div>
      <div class="col">
        <label>Aluno</label>
        <select class="custom-select" name="aluno_id" required autofocus>
          <option value="">Escolha uma opção...</option>
          @foreach ($aluno as $key => $a)
            <option value="{{ $a->id }}" {{(isset($registro->aluno_id) && $registro->aluno_id == $a->id  ? 'selected' : '')}}>{{ $a->nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        <label>Bloqueado?</label>
        <select class="custom-select" name="bloqueado" required autofocus>
          <option value="não" {{ (isset($registro->bloqueado) && $registro->bloqueado == 'não' ? 'selected' : '') }}>Não</option>
          <option value="sim" {{ (isset($registro->bloqueado) && $registro->bloqueado == 'sim' ? 'selected' : '') }}>Sim</option>
        </select>
      </div>
      <div class="col">
        <label>Motivo do Bloqueio</label>
        <textarea class="form-control" name="motivoBloqueio" rows="3">
          {{ isset($registro->motivoBloqueio) ? $registro->motivoBloqueio : '' }}
        </textarea>
      </div>
    </div>
  </div>
</div>
