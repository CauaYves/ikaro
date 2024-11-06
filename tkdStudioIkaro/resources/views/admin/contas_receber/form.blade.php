<style type="text/css">
	.carregando{
		color:#ff0000;
		display:none;
	}
</style>

<div class="row">

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Aluno</label>
    <select class="custom-select" name="aluno_id" id="aluno" required autofocus>
      <option value="">Escolha uma opção...</option>
      @foreach ($aluno as $key => $a)
        <option value="{{ $a->id }}" {{ isset($receber->aluno_id) && $receber->aluno_id == $a->id ? 'selected' : '' }}>{{ $a->nome }}</option>
      @endforeach
    </select>
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
      <option value="Boleto" >Boleto</option>
      <option value="Cartão de Crédito" >Cartão de Crédito</option>
      <option value="Cartão de Débito" >Cartão de Débito</option>
      <option value="Cheque" >Cheque</option>
      <option value="Crédito em Conta" >Crédito em Conta</option>
      <option value="Débito em Conta" >Débito em Conta</option>
      <option value="Dinheiro" >Dinheiro</option>
    </select>
  </div>

  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Atividade</label>
    <select class="custom-select" name="atividade_id" id="atividade" required>
      <option value=""></option>
    </select>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Desconto</label>
    <select class="custom-select" name="desconto_id" id="desconto">
      <option data-diferenca="" value=""></option>
    </select>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-4">
    <label>Mensalidade</label>
    <select class="custom-select" name="mensalidade_id" id="mensalidade">
      <option data-diferenca="" value="" class="dinheiro"></option>
    </select>
  </div>
	<div class="col-sm-12 col-md-12 col-lg-4">
    <label>Valor Total a Pagar</label>
    <input type="text" name="parcela" id="resultado" class="form-control" value="">
  </div>
</div>

<script type="text/javascript">
    $('#aluno').change(function(){
    var alunoID = $(this).val();
    if(alunoID){
        $.ajax({
           type:"GET",
           url:"{{url('/admin/contas_receber/atividadeAluno')}}",
					 data: "aluno_id="+alunoID,
           success:function(res){
            if(res){
                $("#atividade").empty();
                $("#atividade").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#atividade").append('<option value="'+value.atividade_id+'">'+value.atividade+'</option>');
                });

            }else{
               $("#atividade").empty();
            }
           }
        });
    }else{
        $("#atividade").empty();
        $("#desconto").empty();
    }
   });


	 $('#atividade').change(function(){
	 var alunoID = $("select[name='aluno_id']").val();
	 var atividadeID = $("select[name='atividade_id']").val();

	 if(atividadeID){
			 $.ajax({
					type:"GET",
					url:"{{url('/admin/contas_receber/descontoAluno')}}",
					data: { aluno_id: alunoID, atividade_id: atividadeID },
					success:function(res){
					 if(res){
							 $("#desconto").empty();
							 $("#desconto").append('<option>Select</option>');
							 $.each(res,function(key,value){
									 $("#desconto").append('<option data-diferenca="'+value.valor+'" value="'+value.atividade_id+'">'+value.valor+'</option>');
							 });
					 }else{
							$("#desconto").empty();
					 }
					}
			 });
	 }else{
			 $("#desconto").empty();
	 }
	});


	$('#desconto').on('change',function(){
  // var descontoID = $(this).val();
	var alunoID = $("select[name='aluno_id']").val();
	var descontoID = $("select[name='atividade_id']").val();

  if(descontoID){
      $.ajax({
         type:"GET",
         url:"{{url('/admin/contas_receber/atividadeValor')}}",
				 data: {aluno_id: alunoID, desconto_id: descontoID},
         success:function(res){
          if(res){
              $("#mensalidade").empty();
              $.each(res,function(key,value){
                  $("#mensalidade").append('<option data-diferenca="'+value.valorAtividade+'" value="'+value.desconto_id+'">'+value.valorAtividade+'</option>');
									$('#resultado').val(value.totalPagar);
              });

          }else{
             $("#mensalidade").empty();
          }
         }
      });
  }else{
      $("#mensalidade").empty();
  }
 });


</script>
