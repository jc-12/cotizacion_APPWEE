<?php
    // TODO: Se define la clase "Cliente" que extiende de la clase "Conectar".
    class Cliente extends Conectar{

        // TODO: Función para obtener todos los clientes de la base de datos.
        public function get_cliente(){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para obtener todos los clientes activos.
            $sql="SELECT * FROM tm_cliente WHERE cli_est=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para insertar un nuevo cliente en la base de datos.
        public function insert_cliente($cli_nom, $cli_ruc, $cli_telf, $cli_email){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para insertar un nuevo cliente.
            $sql="INSERT INTO tm_cliente (cli_id, cli_nom, cli_ruc, cli_telf, cli_email, cli_est) VALUES (NULL, ?, ?, ?, ?, '1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_nom);
            $sql->bindValue(2, $cli_ruc);
            $sql->bindValue(3, $cli_telf);
            $sql->bindValue(4, $cli_email);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para actualizar un cliente existente en la base de datos.
        public function update_cliente($cli_id, $cli_nom, $cli_ruc, $cli_telf, $cli_email){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para actualizar un cliente.
            $sql="UPDATE tm_cliente set
                cli_nom = ?,
                cli_ruc = ?,
                cli_telf = ?,
                cli_email = ?
                WHERE
                cli_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_nom);
            $sql->bindValue(2, $cli_ruc);
            $sql->bindValue(3, $cli_telf);
            $sql->bindValue(4, $cli_email);
            $sql->bindValue(5, $cli_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para eliminar un cliente de la base de datos.
        public function delete_cliente($cli_id){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // Se define la consulta SQL para eliminar una cliente.
            $sql="UPDATE tm_cliente SET
                cli_est = 0
                WHERE
                cli_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

        // TODO: Función para obtener una cliente específica de la base de datos.
        public function get_cliente_x_id($cli_id){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM tm_cliente WHERE cli_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cli_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

    }
?>