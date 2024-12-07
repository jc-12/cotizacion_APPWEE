<?php  

require_once("../../config/conexion.php");
/* TODO Destruir la sesion */
session_destroy();
/* TODO Luego de cerrar la cesion se envia a la pantalla de loggin */
header("Location:".Conectar::ruta()."index.php");
exit();

?>