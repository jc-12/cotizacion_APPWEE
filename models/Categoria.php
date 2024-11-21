<?php
    // TODO: Se define la clase "Categoria" que extiende de la clase "Conectar".
    class Categoria extends Conectar{

        // TODO: Función para obtener todas las categorías de la base de datos.
        public function get_categoria(){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para obtener todas las categorías activas.
            $sql="SELECT * FROM tm_categoria WHERE est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para insertar una nueva categoría en la base de datos.
        public function insert_categoria($cat_nom,$cat_descrip){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para insertar una nueva categoría.
            $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_descrip, est) VALUES (NULL, ?, ?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_descrip);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para actualizar una categoría existente en la base de datos.
        public function update_categoria($cat_id,$cat_nom,$cat_descrip){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para actualizar una categoría.
            $sql="UPDATE tm_categoria set
                cat_nom = ?,
                cat_descrip = ?
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_descrip);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para eliminar una categoría de la base de datos.
        public function delete_categoria($cat_id){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // Se define la consulta SQL para eliminar una categoría.
            $sql="UPDATE tm_categoria SET
                est = 0
                WHERE
                cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para obtener una categoría específica de la base de datos.
        public function get_categoria_x_id($cat_id){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM tm_categoria WHERE cat_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para obtener una nombre categoría específica de la base de datos.
        public function get_categoria_x_nom($cat_nom){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM tm_categoria 
            WHERE cat_nom = ?
            AND est=1";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

    }
?>