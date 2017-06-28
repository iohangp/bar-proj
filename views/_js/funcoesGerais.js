
$(document).ready(function() {



  $(":input").inputmask();

  $(".maskmoney").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

  $(".select2_group").select2({});
  $(".select2_multiple").select2({
    maximumSelectionLength: 1,
    placeholder: "Max. 1 categoria",
    allowClear: true
  });

  $(".js-switch").change(function(){
  	
  		if($(this).is(':checked'))
  		   $(this).val(1);
  		else
  		   $(this).val(0) 
  });




  /********************* Categorias *************************/

  $(".excluirCat").click(function(){

    var idCategoria = $(this).attr('attribute');

  $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
          "Excluir": function() {
            window.location.href = urlSite+"/categorias/excluir/"+idCategoria;
          },
          Cancelar: function() {
            $( this ).dialog( "close" );
          }
        }
  });
  });


  /************************ Produtos ***********************/

$(".excluirProd").click(function(){

    var idProduto = $(this).attr('attribute');

  $( "#dialog-confirm" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
          "Excluir": function() {
            window.location.href = urlSite+"/produtos/excluir/"+idProduto;
          },
          Cancelar: function() {
            $( this ).dialog( "close" );
          }
        }
  });
  });

	
});






