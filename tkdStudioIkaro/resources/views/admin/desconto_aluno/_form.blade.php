<div class="card">
  <div class="card-header bg-dark text-white">
    <b>Cadastro do Valor do Desconto para o aluno(a) <b class="text-warning"> {{ $alunos->nome }}</b></b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>ID Aluno</label>
        <input type="text" name="aluno_id" class="form-control" value="{{ isset($registro->aluno_id) ? $registro->aluno_id : $aluno }}" readonly>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-6">
        <label>Atividade</label>
        <select class="custom-select" required name="atividade_id">
          <option value="">Escolha uma opção...</option>
          @foreach ($atividade as $key => $a)
            <option value="{{ $a->id }}" {{ isset($registro->atividade_id) && $registro->atividade_id == $a->id ? 'selected' : ''}}>{{ $a->nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="col">
        <label>Valor</label>
        <input type="text" name="valor" class="form-control dinheiro" value="{{ isset($registro->valor) ? $registro->valor : '' }}" required autofocus>
      </div>
    </div>

  </div>
</div>
