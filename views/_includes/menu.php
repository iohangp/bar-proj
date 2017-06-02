<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo URL?>" class="site_title"><i class="fa fa-beer"></i> <span>BarSys</span></a>
		</div>

		<div class="clearfix"></div>

		<br />

		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu"> 
			<div class="menu_section">
				<h3>Geral</h3>
				<ul class="nav side-menu">
					<li><a href="<?php echo URL?>"><i class="fa fa-tachometer"></i> Dashboard </a></li>
					<li><a><i class="fa fa-edit"></i> Produtos <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo URL."/produtos"?>">Cadastro de Produtos</a></li>
							<li><a href="<?php echo URL."/categorias"?>">Categorias</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-money"></i> Pedidos</a></li>
					<li><a><i class="fa fa-bar-chart-o"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#">Pedidos</a></li>
							<li><a href="#">Estoque</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="menu_section">
				<h3>Outras Opções</h3>
				<ul class="nav side-menu">
					<li><a href="<?php echo URL."/users"?>"><i class="fa fa-user"></i> Usuários</a></li>
					<li><a><i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
				</ul>
			</div>

		</div>

	</div>
</div>

<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo IMG?>site/user.png" alt=""><?php echo $_SESSION['usuario']['nome'];?>
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="<?php echo URL."/users/edit"?>"> Editar Perfil</a></li>
						<li>
							<a href="<?php echo URL."/users"?>">
								<span>Usuários</span>
							</a>
						</li>
						<li><a href="javascript:;">Ajuda</a></li>
						<li><a href="<?php echo URL."/login/logoff"?>"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
					</ul>
				</li>

				<li role="presentation" class="dropdown">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green">6</span>
					</a>
					<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
						<li>
							<a>
								<span class="image"><img src="<?php echo IMG?>site/user.png" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo IMG?>site/user.png" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo IMG?>site/user.png" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<a>
								<span class="image"><img src="<?php echo IMG?>site/user.png" alt="Profile Image" /></span>
								<span>
									<span>John Smith</span>
									<span class="time">3 mins ago</span>
								</span>
								<span class="message">
									Film festivals used to be do-or-die moments for movie makers. They were where...
								</span>
							</a>
						</li>
						<li>
							<div class="text-center">
								<a>
									<strong>See All Alerts</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>