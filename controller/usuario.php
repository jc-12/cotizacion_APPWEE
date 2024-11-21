<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");

    //TODO: Se crea una instancia de la clase Usuario
    $usuario = new Usuario();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de usuario, se inserta un nuevo usuario
            if(empty($_POST["usu_id"])){
                $usuario->insert_usuario($_POST["usu_correo"],$_POST["usu_nom"],$_POST["usu_pass"]);
            }else{
                //TODO: Si se envió un id de usuario, se actualiza el usuario correspondiente
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_correo"],$_POST["usu_nom"],$_POST["usu_pass"]);
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todos los usuarios y se preparan los datos para enviar como respuesta
            $datos=$usuario->get_usuario();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["usu_nom"];
                $sub_array[] = $row["usu_correo"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["usu_id"].')" id="'.$row["usu_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
                $data[] = $sub_array;
            }

            //TODO: Se prepara la respuesta en formato JSON
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        //TODO: Si la acción es "mostrar"
        case "mostrar":
            //TODO: Se obtiene la información del usuario con el id enviado y se prepara la respuesta en formato JSON
            $datos=$usuario->get_usuario_x_id($_POST["usu_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["usu_id"]=$row["usu_id"];
                    $output["usu_nom"]=$row["usu_nom"];
                    $output["usu_correo"]=$row["usu_correo"];
                    $output["usu_pass"]=$row["usu_pass"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina el usuario con el id enviado
            $usuario->delete_usuario($_POST["usu_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todos los usuarios y se prepara el HTML para enviar como respuesta
            $datos=$usuario->get_usuario();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["usu_id"]."'>".$row["usu_id"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>