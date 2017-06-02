<?php if ( ! defined('DIR')) exit; ?>

<?php
$filter['api_key'] = $_SESSION['usuario']['api_key'];
$filter['sku'] = $parametros[0];



$dadosProdutos = $modelo->selectProdutos($filter);

foreach ($dadosProdutos as $key => $value) {
  	$produto = $value;
}


$filterCat['api_key'] = $_SESSION['usuario']['api_key'];
$dadosCategoria = $modeloCat->selectCategorias($filterCat);

//echo'<pre>';print_r($prodCat);echo'</pre>';

?>


<div class="right_col" role="main">

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Edição do Produto</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
                    <small>Você pode alterar a qualquer momento as informações do produto</small>

                    <div class="clearfix"></div>
                  </div>

					<div class="x_content">		
						<br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="_id" value="<?=@$produto->_id?>" />   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$produto->name?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descrição <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                           <textarea id="description" required="required" rows="5" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" 
                            data-parsley-validation-threshold="10"><?=$produto->description?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estoque <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required="required" type="number" name="qty" id="qty" class="form-control col-md-2 col-xs-12" type="text" name="middle-name" value="<?=$produto->qty?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço <span class="required">*</span></label>
                         <div class="col-md-2">
                         <input type="text" required="required" name="price" id="price" class="form-control maskmoney" value="<?=@number_format($produto->price,2,',','.')?>" />

                        </div>
                        <label class="control-label col-md-2">Preço Promocional</label>
                         <div class="col-md-2">
                         <input type="text" class="form-control maskmoney" name="promotional_price" id="promotional_price" value="<?=@number_format($produto->promotional_price,2,',','.')?>" />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Custo </label>
                         <div class="col-md-2">
                         <input type="text" class="form-control maskmoney" name="cost" id="cost" value="<?=@number_format($produto->cost,2,',','.')?>" />
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Peso <span class="required">*</span></label>
                         <div class="col-md-2">
                         <input type="text" required="required" name="weight" id="weight" class="form-control" value="<?=@$produto->weight?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Altura <span class="required">*</span></label>
                        <div class="col-md-1">
                          <input type="text" required="required" name="height" id="height" class="form-control" value="<?=@$produto->height?>" />
                        </div>
                        <label class="control-label col-md-1">Largura <span class="required">*</span></label>
                        <div class="col-md-1">
                          <input type="text" required="required" name="width" id="width" class="form-control" value="<?=@$produto->width?>" />
                        </div>
                        <label class="control-label col-md-2">Comprimento <span class="required">*</span></label>
                        <div class="col-md-1">
                          <input type="text" required="required" name="length" id="length" class="form-control" value="<?=@$produto->length?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marca <span class="required">*</span></label>
                         <div class="col-md-3">
                         <input type="text" required="required" name="brand" id="brand" class="form-control" value="<?=@$produto->brand?>" />
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">EAN <span class="required">*</span></label>
                         <div class="col-md-2">
                         <input type="text" required="required" name="ean" id="ean" class="form-control" value="<?=@$produto->ean?>" />
                        </div>
                        <label class="control-label col-md-2">NBM</label>
                         <div class="col-md-2">
                         <input type="text" class="form-control" name="nbm" id="nbm" value="<?=@$produto->nbm?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categorias</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="categories[]" class="select2_multiple form-control" multiple="multiple">
                            <option>Escolha uma categoria</option>
                            <? foreach($dadosCategoria as $categoria){

                                $selected = '';
                                foreach($produto->categories as $cat){
                                  if($cat->code == $categoria->code)
                                    $selected = 'selected';
                                }                                
                            ?>
                               <option <?=$selected?> value="<?=$categoria->code?>"><?=$categoria->name?></option>
                            <?}?>
                                                 
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancelar</button>
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                      </div>

                    </form>
					


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
