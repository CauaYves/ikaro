$(document).ready(function(){
  $('.carousel').carousel({
    interval: 3000
  });

  $('.cep').mask('00000-000');
  $('.telefone').mask('(00) 0000-0000');
  $('.celular').mask('(00) 0 0000-0000');
  $('.cpf').mask('000.000.000-00');
  $('.dinheiro').mask('###.###.##0,00', {reverse: true});
  $('.horario').mask('00:00');
});

//
// //função de autocomplete
// $( function() {
//   $( "#atleta_autocomplete" ).autocomplete({
//     source: '/admin/atleta/autocomplete'
//   });
// });

//
// //Calcular onblur view venda.blade.php
// function calcular(){
//     var valor1  = parseFloat((document.getElementById('campo1').value).replace(',', '.'));
//     var valor2 = parseFloat((document.getElementById('campo2').value).replace(',', '.'));
//
//     if (!isNaN(valor1) && !isNaN(valor2)){
//       document.getElementById('diferenca').value = ((valor2 - valor1).toFixed(2)).replace('.', ',');
//     }
// }

    function validate(){
      var $selected = $('#desconto, #mensalidade').children(":selected");
      var sum = 0;

      $selected.each(function() {
        sum += $(this).data('diferenca') || 0;
      });

      $('#total').html(sum === 0 ? '' : sum);
    }
    validate();

    $('#desconto, #mensalidade').on('change', function() {
      validate();
    });
