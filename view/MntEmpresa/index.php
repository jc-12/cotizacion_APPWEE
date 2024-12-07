<?php
	require_once("../../config/conexion.php");
    session_start();
	if(isset($_SESSION["usu_id"])){
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Empresa | Sistema cotizción</title>
    <?php require_once("../Html/Head.php")?>
</head>
<body>

	<div id="page-loader" class="fade show"><span class="spinner"></span></div>

	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">

        <?php require_once("../Html/Header.php")?>

        <?php require_once("../Html/Sidebar.php")?>

		<div id="content" class="content">

			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item active">Empresa</li>
			</ol>

			<h1 class="page-header">Empresa <small>Registro, Modificación y Eliminación de Registros</small></h1>

			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Mantenimiento de Empresa</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>
				<div class="panel-body">
                    <button type="button" id="btnnuevo" class="btn btn-primary">Nuevo Registro</button>
                    <br><br>
                    <table id="lista_data" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr>
								<th class="text-nowrap">Nombre</th>
								<th class="text-nowrap">Porcentaje</th>


                                <th width="1%"></th>
                                <th width="1%"></th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>

	</div>

    <?php require_once("mnt.php")?>

    <?php require_once("../Html/modal.php")?>

    <?php require_once("../Html/Js.php")?>

    <script type="text/javascript" src="empresa.js"></script>

</body>
</html>


<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
        exit();
	}
?>
