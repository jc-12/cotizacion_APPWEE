<?php


    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Categoria.php");

    //TODO: Se crea una instancia de la clase Categoria
    $categoria = new Categoria();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de categoría, se inserta una nueva categoría
            if(empty($_POST["cat_id"])){
                $datos=$categoria->get_categoria_x_nom($_POST["cat_nom"]);
                if(is_array($datos)==true and count($datos)>0){
                    echo "error";
                }else{
                    $categoria->insert_categoria($_POST["cat_nom"],$_POST["cat_descrip"]);
                    echo "ok";
                }
            }else{
                //TODO: Si se envió un id de categoría, se actualiza la categoría correspondiente
                $categoria->update_categoria($_POST["cat_id"],$_POST["cat_nom"],$_POST["cat_descrip"]);
                echo "ok";
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todas las categorías y se preparan los datos para enviar como respuesta
            $datos=$categoria->get_categoria();
            $data=Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["cat_descrip"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["cat_id"].')" id="'.$row["cat_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["cat_id"].')" id="'.$row["cat_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
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
            //TODO: Se obtiene la información de la categoría con el id enviado y se prepara la respuesta en formato JSON
            $datos=$categoria->get_categoria_x_id($_POST["cat_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["cat_id"]=$row["cat_id"];
                    $output["cat_nom"]=$row["cat_nom"];
                    $output["cat_descrip"]=$row["cat_descrip"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina la categoría con el id enviado
            $categoria->delete_categoria($_POST["cat_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todas las categorías y se prepara el HTML para enviar como respuesta
            $datos=$categoria->get_categoria();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["cat_id"]."'>".$row["cat_nom"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>
