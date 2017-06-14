
$(document).ready(function() {



  $(":input").inputmask();

  $(".maskmoney").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

  $(".select2_group").select2({});
  $(".select2_multiple").select2({
    maximumSelectionLength: 3,
    placeholder: "Max. 3 categorias",
    allowClear: true
  });

  $(".js-switch").change(function(){
  	
  		if($(this).is(':checked'))
  		   $(this).val(1);
  		else
  		   $(this).val(0) 
  });

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


  /********************* Categorias *************************/


	
});






