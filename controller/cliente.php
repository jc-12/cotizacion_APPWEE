<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Cliente.php");

    //TODO: Se crea una instancia de la clase Cliente
    $cliente = new Cliente();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de cliente, se inserta un nuevo cliente
            if(empty($_POST["cli_id"])){
                $cliente->insert_cliente($_POST["cli_nom"],$_POST["cli_ruc"],$_POST["cli_telf"],$_POST["cli_email"]);
            }else{
                //TODO: Si se envió un id de cliente, se actualiza el cliente correspondiente
                $cliente->update_cliente($_POST["cli_id"],$_POST["cli_nom"],$_POST["cli_ruc"],$_POST["cli_telf"],$_POST["cli_email"]);
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todos los clientes y se preparan los datos para enviar como respuesta
            $datos=$cliente->get_cliente();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cli_nom"];
                $sub_array[] = $row["cli_ruc"];
                $sub_array[] = $row["cli_telf"];
                $sub_array[] = $row["cli_email"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["cli_id"].')" id="'.$row["cli_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["cli_id"].')" id="'.$row["cli_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
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
            //TODO: Se obtiene la información del cliente con el id enviado y se prepara la respuesta en formato JSON
            $datos=$cliente->get_cliente_x_id($_POST["cli_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["cli_id"]=$row["cli_id"];
                    $output["cli_nom"]=$row["cli_nom"];
                    $output["cli_ruc"]=$row["cli_ruc"];
                    $output["cli_telf"]=$row["cli_telf"];
                    $output["cli_email"]=$row["cli_email"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina el cliente con el id enviado
            $cliente->delete_cliente($_POST["cli_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todas los cliente y se prepara el HTML para enviar como respuesta
            $datos=$cliente->get_cliente();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["cli_id"]."'>".$row["cli_nom"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>