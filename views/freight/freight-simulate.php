<?php if ( ! defined('DIR')) exit; ?>

<?php
//$dadosProdutos = $modelo->listarProdutos();
?>


<div class="right_col" role="main">

	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Detalhes do Produto</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">EDITAR</a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">

						<div class="col-md-7 col-sm-7 col-xs-12">
							<div class="product-image">
								<img src="<?php echo IMG?>produtos/prod-1.jpg" alt="..." />
							</div>
							<div class="product_gallery">
								<a>
									<img src="<?php echo IMG?>produtos/prod-2.jpg" alt="..." />
								</a>
								<a>
									<img src="<?php echo IMG?>produtos/prod-3.jpg" alt="..." />
								</a>
								<a>
									<img src="<?php echo IMG?>produtos/prod-4.jpg" alt="..." />
								</a>
								<a>
									<img src="<?php echo IMG?>produtos/prod-5.jpg" alt="..." />
								</a>
							</div>
						</div>

						<div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">

							<h3 class="prod_title">Produto de testes</h3>
							<div class="">
								<h2>SKU: <small>12UHEJDOS</small></h2>
							</div>
							<div class="">
								<h2>Cores</h2>
								<ul class="list-inline prod_color">
									<li>
										<p>Green</p>
										<div class="color bg-green"></div>
									</li>
									<li>
										<p>Blue</p>
										<div class="color bg-blue"></div>
									</li>
									<li>
										<p>Red</p>
										<div class="color bg-red"></div>
									</li>
									<li>
										<p>Orange</p>
										<div class="color bg-orange"></div>
									</li>

								</ul>
							</div>
							<br />

							<div class="">
								<h2>Tamanhos</h2>
								<ul class="list-inline prod_size">
									<li>
										<button type="button" class="btn btn-default btn-xs">Small</button>
									</li>
									<li>
										<button type="button" class="btn btn-default btn-xs">Medium</button>
									</li>
									<li>
										<button type="button" class="btn btn-default btn-xs">Large</button>
									</li>
									<li>
										<button type="button" class="btn btn-default btn-xs">Xtra-Large</button>
									</li>
								</ul>
							</div>
							<br />

							<div class="">
								<div class="product_price">
									<h1 class="price">R$ 80,00</h1>
								</div>
							</div>
						</div>


						<div class="col-md-12">

							<div class="" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
									<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Descrição</a>
									</li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
										<p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
											synth. Cosby sweater eu banh mi, qui irure terr.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
