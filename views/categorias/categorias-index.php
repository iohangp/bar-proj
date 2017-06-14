<?php if ( ! defined('DIR')) exit; ?>

<?php
$dadosCategorias = $modelo->listarCategorias();

//Printa a mensagem de confirmação;

?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Listagem de Categorias<small> ativos/inativos</small></h3>
			</div>

			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Pesquisar">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">OK</button>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Categorias</h2>
						<div style="float:right;">
							<a href="<?php echo URL."/categorias/inserir/"?>" class="btn btn-primary btn-sm"> Adicionar </a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<p>Aqui são listadas as categorias disponíveis para serem relacionadas aos produtos.</p>

						<div id="dialog-confirm" title="Deseja excluir a categoria?" style="display: none">
						  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
						   A categoria será excluída e não poderá ser recuperada. Você tem certeza?</p>
						</div>
						<!-- start project list -->
						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 1%">ID</th>
									<th style="width: 20%">Nome</th>
									<th>Status</th>
									<th style="width: 20%"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($dadosCategorias as $categorias){
									//echo'<pre>';print_r($produtos);echo'</pre>';
									?>
								<tr>
									<td><?=$categorias['id'] ?></td>
									<td>
										<a><?=$categorias['nome_categoria']?></a>
									</td>
									<td>
										<? 
											$class = ($categorias['situacao_categoria'] == 1 ? 'btn-success' : 'btn-danger');
											$status = ($categorias['situacao_categoria'] == 1 ? 'ATIVO' : 'INATIVO');
										 ?>
										<button type="button" class="btn <?=$class?> btn-xs"><?=$status?></button>
									</td>
									<td>
										
										<a href="<?php echo URL."/categorias/editar/".$categorias['id']?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
										

										<a attribute="<?=$categorias['id']?>" class="btn btn-danger btn-xs excluirCat"><i class="fa fa-trash-o"></i> Excluir </a>
									</td>
								</tr>
								<?}?>
								
							</tbody>
						</table>
						<!-- end project list -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
        <!-- /page content -->