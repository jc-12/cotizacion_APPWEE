<?php
    //TODO: Se incluyen los archivos necesarios
    require_once("../config/conexion.php");
    require_once("../models/Cargo.php");

    //TODO: Se crea una instancia de la clase Categoria
    $cargo = new Cargo();

    //TODO: Se utiliza un switch para determinar qué acción realizar
    switch($_GET["op"]){

        //TODO: Si la acción es "combo"
        case "combo":
            //TODO: Se obtienen todas las categorías y se prepara el HTML para enviar como respuesta
            $datos=$cargo->get_cargo();
            if(is_array($datos)==true and count($datos)>0){
                $html="";
                $html.="<option selected>Seleccionar</option>";
                foreach($datos as $row){
                    $html.= "<option value='".$row["car_id"]."'>".$row["car_nom"]."</option>";
                }
                echo $html;
            }
            break;

    }
?>
