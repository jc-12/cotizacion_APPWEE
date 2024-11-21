<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Producto.php");

    //TODO: Se crea una instancia de la clase Producto
    $producto = new Producto();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "guardaryeditar"
        case "guardaryeditar":
            //TODO: Si no se envió un id de producto, se inserta un nuevo producto
            if(empty($_POST["prod_id"])){
                $producto->insert_producto($_POST["cat_id"], $_POST["prod_nom"], $_POST["prod_descrip"], $_POST["prod_precio"]);
            }else{
                //TODO: Si se envió un id de producto, se actualiza el producto correspondiente
                $producto->update_producto($_POST["prod_id"], $_POST["cat_id"], $_POST["prod_nom"], $_POST["prod_descrip"], $_POST["prod_precio"]);
            }
            break;

        //TODO: Si la acción es "listar"
        case "listar":
            //TODO: Se obtienen todos los productos y se preparan los datos para enviar como respuesta
            $datos = $producto->get_producto();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["prod_nom"];
                $sub_array[] = $row["prod_descrip"];
                $sub_array[] = $row["prod_precio"];
                $sub_array[] = '<button type="button" onClick="editar('.$row["prod_id"].')" id="'.$row["prod_id"].'" class="btn btn-warning btn-xs">Editar</button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["prod_id"].')" id="'.$row["prod_id"].'" class="btn btn-danger btn-xs">Eliminar</button>';
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
            //TODO: Se obtiene la información del producto con el id enviado y se prepara la respuesta en formato JSON
            $datos = $producto->get_producto_x_id($_POST["prod_id"]);
            if (is_array($datos)==true and count($datos)>0){
                foreach($datos as $row){
                    $output["prod_id"]=$row["prod_id"];
                    $output["cat_id"]=$row["cat_id"];
                    $output["prod_nom"]=$row["prod_nom"];
                    $output["prod_descrip"]=$row["prod_descrip"];
                    $output["prod_precio"]=$row["prod_precio"];
                }
                echo json_encode($output);
            }
            break;

        //TODO: Si la acción es "eliminar"
        case "eliminar":
            //TODO: Se elimina el producto con el id enviado
            $producto->delete_producto($_POST["prod_id"]);
            break;

        //TODO: Si la acción es "combo"
        case "combo_x_categoria":
            //TODO: Se obtienen todas los productos y se prepara el HTML para enviar como respuesta
            $datos=$producto->get_producto_x_categoria($_POST["cat_id"]);
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["prod_id"]."'>".$row["prod_nom"]."</option>";
                }
                echo $html;
            }
            break;

        }
?>
