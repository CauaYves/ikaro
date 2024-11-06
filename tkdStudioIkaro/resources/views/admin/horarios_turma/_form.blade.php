<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro dos horários da turma</b>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <label>ID Turma</label>
        <input type="text" name="turma_id" class="form-control" value="{{ isset($registro->turma_id) ? $registro->turma_id : $turma->id }}" readonly>
      </div>
      <div class="col">
        <label>Dia da Semana</label>
        <select class="custom-select" name="diaSemana" required autofocus>
          <option value="">Escolha uma opção...</option>
          <option value="Domingo" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Domingo'  ? 'selected' : '')}}>Domingo</option>
          <option value="Segunda-Feira" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Segunda-Feira'  ? 'selected' : '')}}>Segunda-Feira</option>
          <option value="Terça-Feira" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Terça-Feira'  ? 'selected' : '')}}>Terça-Feira</option>
          <option value="Quarta-Feira" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Quarta-Feira'  ? 'selected' : '')}}>Quarta-Feira</option>
          <option value="Quinta-Feira" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Quinta-Feira'  ? 'selected' : '')}}>Quinta-Feira</option>
          <option value="Sexta-Feira" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Sexta-Feira'  ? 'selected' : '')}}>Sexta-Feira</option>
          <option value="Sábado" {{(isset($registro->diaSemana) && $registro->diaSemana == 'Sábado'  ? 'selected' : '')}}>Sábado</option>
        </select>
      </div>
      <div class="col">
        <label>Início</label>
        <input type="text" name="horarioEntrada" class="form-control horario" value="{{ isset($registro->horarioEntrada) ? $registro->horarioEntrada : '' }}" required>
      </div>
      <div class="col">
        <label>Término</label>
        <input type="text" name="horarioSaida" class="form-control horario" value="{{ isset($registro->horarioSaida) ? $registro->horarioSaida : '' }}" required>
      </div>
    </div>
  </div>
</div>
