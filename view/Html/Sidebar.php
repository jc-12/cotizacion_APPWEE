<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="../../assets/img/user/user-13.jpeg" alt="">
							</div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?php echo $_SESSION["usu_nombre"]?>
								<small>Comercial</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Perfil</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Enviar Comentarios</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Ayuda</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Menu</li>
					<li class="has-sub">
						<a href="javascript:;">
							<i class="fa fa-th-large"></i>
							<span>Dashboard</span>
						</a>
					</li>
				
					<li>
						<a href="widget.html">
							<i class="fab fa-simplybuilt"></i> 
							<span>Widgets <span class="label label-theme">NEW</span></span> 
						</a>
					</li>


					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-list-ol"></i>
							<span>Mantenimiento</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="../MntCliente/">Cliente</a></li>
							<li><a href="../MntContacto/">Contacto</a></li>
							<li><a href="../MntCategoria/">Categoria</a></li>
							<li><a href="../MntProducto/">Producto</a></li>
							<li><a href="../MntEmpresa/">Empresa</a></li>
							<li><a href="../MntUsuario/">Usuario</a></li>
						</ul>
					</li>
     
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-gem"></i>
							<span>Cotización</span> 
						</a>
						<ul class="sub-menu">
							<li><a href="ui_typography.html">Nueva Cotización</a></li>
							<li><a href="ui_typography.html">Listado Cotización</a></li>
						</ul>
					</li>
			






					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		