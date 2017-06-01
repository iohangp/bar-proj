<?php if ( ! defined('DIR')) exit; ?>

<?php
$filter['api_key'] = $_SESSION['usuario']['api_key'];
$dadosProdutos = $modelo->selectProdutos($filter);


?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Listagem Geral dos Produtos<small> ativos/inativos</small></h3>
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
						<h2>Produtos</h2>
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

						<p>Aqui estão listados todos os produtos disponíveis para serem enviados em seus marketplaces.</p>

						<!-- start project list -->
						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 1%">SKU</th>
									<th style="width: 20%">Nome</th>
									<th>Estoque</th>
									<th>Plataformas</th>
									<th>Preço</th>
									<th>Status</th>
									<th style="width: 20%"></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($dadosProdutos as $produtos){
									//echo'<pre>';print_r($produtos);echo'</pre>';
									?>
								<tr>
									<td><?=$produtos->sku ?></td>
									<td>
										<a><?=$produtos->name?></a>
										<br />
										<small>Enviado <?=@$produtos->create_date?></small>
									</td>
									<td><?=$produtos->qty?></td>
									<td>
										<ul class="list-inline">
											<li>
												<button type="button" class="btn btn-success btn-xs">Extra</button>
												<button type="button" class="btn btn-success btn-xs">B2W</button>
												<button type="button" class="btn btn-success btn-xs">Walmart</button>
												<button type="button" class="btn btn-success btn-xs">ML</button>
											</li>
										</ul>
									</td>
									<td>
										R$ <?=number_format($produtos->price,2,',','.')?>
									</td>
									<td>
										<? 
											$class = (strtolower($produtos->status) == 'enabled' ? 'btn-success' : 'btn-danger');
											$status = (strtolower($produtos->status) == 'enabled' ? 'ATIVO' : 'INATIVO');
										 ?>
										<button type="button" class="btn <?=$class?> btn-xs"><?=$status?></button>
									</td>
									<td>
										
										<a href="<?php echo URL."/products/edit/".$produtos->sku?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
										<? 
											$classBtn = (strtolower($produtos->status) == 'enabled' ? 'btn-danger':'btn-success'); 
											$statusBtn = (strtolower($produtos->status) == 'enabled' ? 'Inativar' : 'Ativar');
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