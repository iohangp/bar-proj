<?php if ( ! defined('DIR')) exit; ?>

<?php
$dadosProdutos = $modelo->listarProdutos();


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
						<div style="float:right;">
							<a href="<?php echo URL."/produtos/inserir/"?>" class="btn btn-primary btn-sm"> Adicionar </a>
						</div>
					
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<p>Aqui estão listados todos os produtos disponíveis na sua plataforma.</p>

						<div id="dialog-confirm" title="Deseja excluir o produto?" style="display: none">
						  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
						   O Produto será excluído e não poderá ser recuperado. Você tem certeza?</p>
						</div>
						<!-- start project list -->
						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 1%">ID</th>
									<th style="width: 20%">Nome</th>
									<th>Estoque</th>
									<th>Categoria</th>
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
									<td><?=$produtos['id'] ?></td>
									<td>
										<a><?=$produtos['nome_produto']?></a>
										<br />
										<small>Inserido <?=$produtos['cadastro_format']?></small>
									</td>
									<td><?=$produtos['estoque']?></td>
									<td>
										<?=$produtos['nome_categoria']?>
									</td>
									<td>
										R$ <?=number_format($produtos['preco_venda'],2,',','.')?>
									</td>
									<td>
										<? 
											$class = ($produtos['situacao_produto'] == 1 ? 'btn-success' : 'btn-danger');
											$status = ($produtos['situacao_produto'] == 1 ? 'ATIVO' : 'INATIVO');
										 ?>
										<button type="button" class="btn <?=$class?> btn-xs"><?=$status?></button>
									</td>
									<td>
										
										<a href="<?php echo URL."/produtos/editar/".$produtos['id']?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
										<? 
											$classBtn = ($produtos['situacao_produto'] == 'enabled' ? 'btn-danger':'btn-success'); 
											$statusBtn = ($produtos['situacao_produto'] == 'enabled' ? 'Inativar' : 'Ativar');
										?>

										<a attribute="<?=$produtos['id']?>" class="btn btn-danger btn-xs excluirProd"><i class="fa fa-trash-o"></i> Excluir </a>
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