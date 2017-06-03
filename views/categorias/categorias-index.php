<?php if ( ! defined('DIR')) exit; ?>

<?php
$dadosCategorias = $modelo->listarCategorias();


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
						<ul class="nav navbar-right panel_toolbox">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">ATIVOS</a>
									</li>
									<li><a href="#">INATIVOS</a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<p>Aqui são listadas as categorias disponíveis para serem relacionadas aos produtos.</p>

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
										<? 
											$classBtn = ($categorias['situacao_categoria'] == 'enabled' ? 'btn-danger':'btn-success'); 
											$statusBtn = ($categorias['situacao_categoria'] == 'enabled' ? 'Inativar' : 'Ativar');
										?>

										<a href="#" class="btn <?=$classBtn?> btn-xs"><i class="fa fa-trash-o"></i> <?=$statusBtn?> </a>
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