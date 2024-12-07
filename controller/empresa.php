<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Empresa.php");

    //TODO: Se crea una instancia de la clase Empresa
    $empresa = new Empresa();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de empresa, se inserta una nueva empresa
            if(empty($_POST["emp_id"])){
                $empresa->insert_empresa($_POST["emp_nom"],$_POST["emp_porcen"]);
            }else{
                //TODO: Si se envió un id de empresa, se actualiza la empresa correspondiente
                $empresa->update_empresa($_POST["emp_id"],$_POST["emp_nom"],$_POST["emp_porcen"]);
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todas las empresas y se preparan los datos para enviar como respuesta
            $datos=$empresa->get_empresa();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["emp_nom"];
                $sub_array[] = $row["emp_porcen"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["emp_id"].')" id="'.$row["emp_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["emp_id"].')" id="'.$row["emp_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
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
            //TODO: Se obtiene la información de la empresa con el id enviado y se prepara la respuesta en formato JSON
            $datos=$empresa->get_empresa_x_id($_POST["emp_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["emp_id"]=$row["emp_id"];
                    $output["emp_nom"]=$row["emp_nom"];
                    $output["emp_porcen"]=$row["emp_porcen"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina la empresa con el id enviado
            $empresa->delete_empresa($_POST["emp_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todas las empresas y se prepara el HTML para enviar como respuesta
            $datos=$empresa->get_empresa();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["emp_id"]."'>".$row["emp_id"]."</option>";
                }
                echo $html;
            }
            break;
    }
?>
