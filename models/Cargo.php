<?php
    // TODO: Se define la clase "Categoria" que extiende de la clase "Conectar".
    class Cargo extends Conectar{

        // TODO: Función para obtener todas las categorías de la base de datos.
        public function get_cargo(){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            $sql="SELECT * FROM tm_cargo WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

    }
?>
