
<?php
    class Contacto extends Conectar{

        // TODO: Función para obtener todos los contactos de la base de datos.
        public function get_contacto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT
            tm_contacto.con_id,
            tm_contacto.cli_id,
            tm_contacto.car_id,
            tm_contacto.con_nom,
            tm_contacto.con_email,
            tm_contacto.con_telf,
            tm_cliente.cli_id,
            tm_cliente.cli_nom,
            tm_cargo.car_id,
            tm_cargo.car_nom
            FROM tm_contacto
            INNER JOIN tm_cliente ON tm_contacto.cli_id = tm_cliente.cli_id
            INNER JOIN tm_cargo ON tm_contacto.car_id = tm_cargo.car_id
            WHERE
            tm_contacto.est=1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para insertar un nuevo contacto en la base de datos.
        public function insert_contacto($cli_id, $car_id, $con_nom, $con_email, $con_telf){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_contacto (con_id, cli_id, car_id, con_nom, con_email, con_telf, est) VALUES (NULL, ?, ?, ?, ?, ?, '1')";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cli_id);
            $sql->bindValue(2, $car_id);
            $sql->bindValue(3, $con_nom);
            $sql->bindValue(4, $con_email);
            $sql->bindValue(5, $con_telf);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para actualizar un contacto existente en la base de datos.
        public function update_contacto($con_id, $cli_id, $car_id, $con_nom, $con_email, $con_telf){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_contacto SET
                    cli_id = ?,
                    car_id = ?,
                    con_nom = ?,
                    con_email = ?,
                    con_telf = ?
                    WHERE con_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cli_id);
            $sql->bindValue(2, $car_id);
            $sql->bindValue(3, $con_nom);
            $sql->bindValue(4, $con_email);
            $sql->bindValue(5, $con_telf);
            $sql->bindValue(6, $con_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para eliminar un contacto de la base de datos.
        public function delete_contacto($con_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_contacto SET est = 0 WHERE con_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $con_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para obtener un contacto específico de la base de datos.
        public function get_contacto_x_id($con_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_contacto WHERE con_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $con_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_contacto_x_cliente_id($cli_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_contacto 
                WHERE
                cli_id = ?
                AND est=1";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cli_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }
?>