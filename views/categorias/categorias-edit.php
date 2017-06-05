<?php if ( ! defined('DIR')) exit; ?>

<?php


if($parametros[0]){
  $dadosCategoria = $modelo->getCategoria($parametros[0]);

  $categoria = $dadosCategoria[0];
}
  //echo'<pre>';print_r($dadosCategoria);echo'</pre>';
?>


<div class="right_col" role="main">

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Cadastro/Edição de Categorias</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
                    <small>Você pode alterar a qualquer momento as informações da categoria</small>

                    <div class="clearfix"></div>
                  </div>

					<div class="x_content">		
						<br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">
                      <input type="hidden" name="_id" value="<?=@$categoria['id']?>" />   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?=@$categoria['nome_categoria']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descrição 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        
                           <textarea id="description" rows="5" class="form-control" name="description" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" 
                            data-parsley-validation-threshold="10"><?=@$categoria['descricao_categoria']?></textarea>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Situação</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <div class="">
                            <label>
                              <input type="checkbox" name="situacao" value="<?=(@$categoria['situacao_categoria'])?>" class="js-switch" <?=@$categoria['situacao_categoria'] == 1 ? 'checked' : ''?>/>
                              
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
