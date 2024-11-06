<div class="row">

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Fornecedor</label>
    <input type="text" name="fornecedor" class="form-control" value="">
  </div>

    <div class="col-sm-12 col-md-12 col-lg-2">
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline1" name="condicao_pagamento" class="custom-control-input" checked="checked" value="0">
      <label class="custom-control-label" for="customRadioInline1"><b>Com Entrada</b></label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
      <input type="radio" id="customRadioInline2" name="condicao_pagamento" class="custom-control-input" value="1">
      <label class="custom-control-label" for="customRadioInline2"><b>Sem Entrada</b></label>
    </div>
  </div>

  <div class="col-sm-12 col-md-12 col-lg-2">
    <label>Total de Parcelas</label>
    <input type="text" name="qnd_parcela" class="form-control" value="">
  </div>

    <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Dias (Tempo das parcelas)</label>
    <input type="text" name="tempo" class="form-control">
  </div>

</div>
<div class="row">

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Primeira Parcela</label>
    <input type="date" name="vencimento" class="form-control" value="">
  </div>

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Forma de Pagamento</label>
    <select class="custom-select" name="formaPagamento">
      <option selected>Escolha uma opção...</option>
      <option value="Boleto" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Boleto' ? 'selected' : '' }}>Boleto</option>
      <option value="Cartão de Crédito" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
      <option value="Cartão de Débito" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
      <option value="Cheque" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Cheque' ? 'selected' : '' }}>Cheque</option>
      <option value="Crédito em Conta" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Crédito em Conta' ? 'selected' : '' }}>Crédito em Conta</option>
      <option value="Débito em Conta" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Débito em Conta' ? 'selected' : '' }}>Débito em Conta</option>
      <option value="Dinheiro" {{ isset($pagar->formaPagamento) && $pagar->formaPagamento == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
    </select>
  </div>

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Valor Total a Pagar</label>
    <input type="text" name="parcela" class="form-control dinheiro" value="">
  </div>
</div>
