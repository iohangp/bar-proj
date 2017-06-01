<?php if ( ! defined('DIR')) exit; ?>

<?php
$dadosProdutos = $modelo->listarProdutos();
?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Editar Perfil</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
							<div class="profile_img">
								<div id="crop-avatar">
									<!-- Current avatar -->
									<img class="img-responsive avatar-view" src="<?php echo IMG?>site/user.png" alt="Avatar" title="Change the avatar">
								</div>
							</div>
							<h3><?php echo $_SESSION['usuario']['nome']?></h3>

							<a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Trocar Imagem</a>
							<br />
						</div>
						<div class="col-md-9 col-sm-9 col-xs-12">

							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Perfil</a>
									</li>
									<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Permissões</a>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">

										<div class="x_panel">
											<div class="x_content">
												<br />
												<form class="form-horizontal form-label-left">

													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Completo</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<input type="text" class="form-control" placeholder="Nome Completo" value="<?php echo $_SESSION['usuario']['nome']?>">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<input type="text" class="form-control" placeholder="Email" value="">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Usuário</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<input type="text" class="form-control" readonly="readonly" placeholder="Usuário" value="<?php echo $_SESSION['usuario']['login']?>">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Senha</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<input type="password" class="form-control" value="senhaaaaa">
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Usuário</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<select class="form-control">
																<option value="cliente">Cliente</option>
																<option value="administrador">Administrador</option>
															</select>
														</div>
													</div>

													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
														<div class="col-md-9 col-sm-9 col-xs-12">
															<div class="">
																<label>
																	<input type="checkbox" class="js-switch" checked /> 
																</label>
															</div>
														</div>
													</div>


													<div class="ln_solid"></div>
													<div class="form-group">
														<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
															<button type="submit" class="btn btn-primary">Cancelar</button>
															<button type="submit" class="btn btn-success">Salvar</button>
														</div>
													</div>

												</form>
											</div>
										</div>

									</div>

									<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

										<!-- start user projects -->
										<table class="data table table-striped no-margin">
											<thead>
												<tr>
													<th></th>
													<th width="50%">Módulo</th>
													<th>Visualizar</th>
													<th>Editar</th>
													<th>Deletar</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1</td>
													<td>Produtos</td>
													<td>
														<div class="radio">
															<label><input type="checkbox" class="flat" checked name="iCheck"></label>
														</div>
													</td>
													<td>
														<div class="radio">
															<label><input type="checkbox" class="flat" checked name="iCheck"></label>
														</div>
													</td>
													<td>
														<div class="radio">
															<label><input type="checkbox" class="flat" checked name="iCheck"></label>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- end user projects -->

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>