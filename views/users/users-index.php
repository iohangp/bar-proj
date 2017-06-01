<?php if ( ! defined('DIR')) exit; ?>

<?php
$dadosProdutos = $modelo->listarProdutos();
?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Listagem Geral dos Usuários<small> ativos/inativos</small></h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Usuários</h2>
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

						<p>Aqui estão listados todos os usuários cadastrados para acessar seu painel.</p>

						<!-- start project list -->
						<table class="table table-striped projects">
							<thead>
								<tr>
									<th style="width: 20%">Nome</th>
									<th>Email</th>
									<th>Login</th>
									<th>Status</th>
									<th style="width: 20%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<a>Alexandre A. Neto</a>
										<br />
										<small>Atualizado 30.10.2016</small>
									</td>
									<td>
										<a>alexandre@webstorm.com.br</a>
									</td>
									<td>
										<a>alexandre</a>
									</td>
									<td>
										<button type="button" class="btn btn-success btn-xs">ATIVO</button>
									</td>
									<td>
										<a href="<?php echo URL."/users/edit/12UHEJDOS"?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
										<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Inativar </a>
									</td>
								</tr>
								
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