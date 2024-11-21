<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Contacto.php");

    //TODO: Se crea una instancia de la clase Contacto
    $contacto = new Contacto();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de contacto, se inserta un nuevo contacto
            if(empty($_POST["con_id"])){
                $contacto->insert_contacto($_POST["cli_id"],$_POST["car_id"],$_POST["con_nom"],$_POST["con_email"],$_POST["con_telf"]);
            }else{
                //TODO: Si se envió un id de contacto, se actualiza el contacto correspondiente
                $contacto->update_contacto($_POST["con_id"],$_POST["cli_id"],$_POST["car_id"],$_POST["con_nom"],$_POST["con_email"],$_POST["con_telf"]);
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todos los contactos y se preparan los datos para enviar como respuesta
            $datos=$contacto->get_contacto();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cli_nom"];
                $sub_array[] = $row["car_nom"];
                $sub_array[] = $row["con_nom"];
                $sub_array[] = $row["con_email"];
                $sub_array[] = $row["con_telf"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["con_id"].')" id="'.$row["con_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["con_id"].')" id="'.$row["con_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
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
            //TODO: Se obtiene la información del contacto con el id enviado y se prepara la respuesta en formato JSON
            $datos=$contacto->get_contacto_x_id($_POST["con_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["con_id"]=$row["con_id"];
                    $output["cli_id"]=$row["cli_id"];
                    $output["car_id"]=$row["car_id"];
                    $output["con_nom"]=$row["con_nom"];
                    $output["con_email"]=$row["con_email"];
                    $output["con_telf"]=$row["con_telf"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina el contacto con el id enviado
            $contacto->delete_contacto($_POST["con_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo_x_cliente":
            //TODO: Se obtienen todas las contacto y se prepara el HTML para enviar como respuesta
            $datos=$contacto->get_contacto_x_cliente_id($_POST["cli_id"]);
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["con_id"]."'>".$row["con_nom"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>