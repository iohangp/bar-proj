<?php if ( ! defined('DIR')) exit; ?>

<?php
//$dadosProdutos = $modelo->listarProdutos();
?>


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Listagem geral das faixas de CEP</h3>
			</div>

		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>CEPs Cadastrados <small></small></h2>
						
						<div class="clearfix"></div>
					</div>
					<div class="x_content" id="teste" >
						<p class="text-muted font-13 m-b-30">
							The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
						</p>
						<table id="datatable-frete" class="table table-striped table-bordered" >
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Position</th>
									<th>Office</th>
									<th>Start date</th>
									<th>Salary</th>
								</tr>
							</thead>


							<tbody>
								<?php for($i = 0; $i < 500; $i++){?>
								<tr>
									<td><?php echo $i?></td>
									<td>Tiger Nixon</td>
									<td>System Architect</td>
									<td>Edinburgh</td>
									<td>2011/04/25</td>
									<td>$320,800</td>
								</tr>
								<tr>
									<td><?php echo $i?></td>
									<td>Garrett Winters</td>
									<td>Accountant</td>
									<td>Tokyo</td>
									<td>2011/07/25</td>
									<td>$170,750</td>
								</tr>
								<tr>
									<td><?php echo $i?></td>
									<td>Ashton Cox</td>
									<td>Junior Technical Author</td>
									<td>San Francisco</td>
									<td>2009/01/12</td>
									<td>$86,000</td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->