<?php if ( ! defined('DIR')) exit; ?>

<?php

if($parametros[0]){
  $dadosProdutos = $modelo->getProduto($parametros[0]);
  $produto = $dadosProdutos[0];
  //echo'<pre>';print_r($produto);echo'</pre>';
}

$dadosCategoria =  $modeloCat->categoriasSelect();

if(@$_GET['status']){
   $status = $_GET['status']; 
   @$mensagem = 'O produto foi salvo com sucesso!';
 }

if(@$status){
?>

  <script>

        $(document).ready(function() {

          $.notify({
          title: '<strong>Cadastro/Edição de Produtos</strong><br>',
          message: '<?=@$mensagem?>'
          },{
            type: '<?=@$status?>'
          });

        });

  </script>
<?
}
?>


<div class="right_col" role="main">

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cadastro/Edição do Produto</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
                    <small>Você pode alterar a qualquer momento as informações do produto</small>

              <div style="float:right;">
                <a href="<?php echo URL."/produtos/"?>" class="btn btn-dark btn-sm"> Voltar </a>
              </div>
            <div class="clearfix"></div>
          </div>

					<div class="x_content">		
						<br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="_id" value="<?=@$produto['id']?>" />   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?=@$produto['nome_produto']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descrição <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                           <textarea id="description" required="required" rows="5" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" 
                            data-parsley-validation-threshold="10"><?=@$produto['descricao_produto']?></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estoque <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" required="required" type="number" name="qty" id="qty" class="form-control col-md-2 col-xs-12" type="text" name="middle-name" value="<?=$produto['estoque']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Preço de Custo<span class="required">*</span></label>
                         <div class="col-md-2">
                         <input type="text" required="required" name="preco_custo" id="preco_custo" class="form-control maskmoney" value="<?=@number_format($produto['preco_custo'],2,',','.')?>" />

                        </div>
                        <label class="control-label col-md-2">Preço de Venda</label>
                         <div class="col-md-2">
                         <input type="text" class="form-control maskmoney" name="preco_venda" id="preco_venda" value="<?=@number_format($produto['preco_venda'],2,',','.')?>" />
                        </div>
                      </div>

                  
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Código <span class="required">*</span></label>
                         <div class="col-md-2">
                         <input type="text" name="ean" id="ean" class="form-control" value="<?=@$produto['codigo']?>" />
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Categorias</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="categories[]" class="select2_multiple form-control" multiple="multiple">
                            <option>Escolha uma categoria</option>
                            <? foreach($dadosCategoria as $categoria){

                                $selected = '';
                               
                                if($produto['id_categoria'] == $categoria['id'])
                                  $selected = 'selected';
                                                           
                            ?>
                               <option <?=@$selected?> value="<?=$categoria['id']?>"><?=$categoria['nome_categoria']?></option>
                            <?}?>
                                                 
                          </select>
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Situação</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" name="situacao" value="<?=(@$produto['situacao_produto'] ? @$produto['situacao_produto'] : 0)?>" class="js-switch" <?=@$produto['situacao_produto'] == 1 ? 'checked' : ''?>/>
                              
                            </label>
                          </div>
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
