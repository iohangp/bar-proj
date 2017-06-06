
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

});
