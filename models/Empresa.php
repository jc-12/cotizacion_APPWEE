<?php
    // TODO: Se define la clase "Empresa" que extiende de la clase "Conectar".
    class Empresa extends Conectar {

        // TODO: Función para obtener todas las empresas de la base de datos.
        public function get_empresa() {
            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para obtener todas las empresas activas.
            $sql = "SELECT * FROM tm_empresa WHERE emp_est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para insertar una nueva empresa en la base de datos.
        public function insert_empresa($emp_nom, $emp_porcen) {
            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para insertar una nueva empresa.
            $sql = "INSERT INTO tm_empresa (emp_id, emp_nom, emp_porcen,emp_est) VALUES (NULL, ?, ?,1);";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $emp_nom);
            $sql->bindValue(2, $emp_porcen);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para actualizar una empresa existente en la base de datos.
        public function update_empresa($emp_id, $emp_nom, $emp_porcen) {
            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para actualizar una empresa.
            $sql = "UPDATE tm_empresa
                SET
                emp_nom = ?,
                emp_porcen = ?
                WHERE
                emp_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $emp_nom);
            $sql->bindValue(2, $emp_porcen);
            $sql->bindValue(3, $emp_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para eliminar una empresa de la base de datos.
        public function delete_empresa($emp_id) {
            // TODO: Se establece la conexión a la base de datos.
            $conectar = parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL para eliminar una empresa.
            $sql = "UPDATE tm_empresa SET emp_est = 0 WHERE emp_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $emp_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para obtener una empresa específica de la base de datos.
        public function get_empresa_x_id($emp_id){
            // TODO: Se establece la conexión a la base de datos.
            $conectar= parent::conexion();
            // TODO: Se configura la codificación de caracteres.
            parent::set_names();
            // TODO: Se define la consulta SQL obtener un registro segun su ID
            $sql="SELECT * FROM tm_empresa WHERE emp_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $emp_id);
            $sql->execute();
            // TODO: Se obtienen los resultados de la consulta en un arreglo.
            return $resultado=$sql->fetchAll();
        }

    }

?>
