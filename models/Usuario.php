<?php
    class Usuario extends Conectar{

        public function login(){
            //TODO: Establecemos una conexión a la base de datos
            $conectar = parent::conexion();
            //TODO: Configuramos el set de caracteres para evitar problemas de codificación
            parent::set_names();
            // Si el formulario de inicio de sesión se ha enviado
            if (isset($_POST["enviar"])){
                //TODO: Obtenemos el correo y la contraseña enviados por el usuario
                $correo = $_POST["usu_correo"];
                $pass = $_POST["usu_pass"];
                //TODO: Si ambos campos están vacíos
                if(empty($correo) and empty($pass)){
                    //TODO: Redirigimos al usuario de vuelta a la página de inicio de sesión con un mensaje de error
                    header("Location:".conectar::ruta()."index.php?m=2");
                    exit();
                }else{
                    //TODO: Preparamos una consulta SQL para obtener los datos del usuario que intenta iniciar sesión
                    $sql = "SELECT * FROM t_usuario WHERE usu_correo=? and usu_pass=?";
                    $sql = $conectar->prepare($sql);
                    $sql->bindValue(1, $correo);
                    $sql->bindValue(2, $pass);
                    $sql->execute();
                    //TODO: Obtenemos los resultados de la consulta
                    $resultado = $sql->fetch();
                    //TODO: Si se encontró un usuario con las credenciales proporcionadas
                    if(is_array($resultado) and count($resultado)>0){
                        //TODO: Almacenamos algunos datos del usuario en la sesión
                        $_SESSION["usu_id"] = $resultado["usu_id"];
                        $_SESSION["usu_nombre"] = $resultado["usu_nombre"];
                        $_SESSION["usu_correo"] = $resultado["usu_correo"];
                        //TODO: Redirigimos al usuario a la página de inicio
                        header("Location:".conectar::ruta()."view/Home/");
                        exit();
                    }else{
                        //TODO: Si las credenciales no son válidas, redirigimos al usuario de vuelta a la página de inicio de sesión con un mensaje de error
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        // TODO: Función para obtener todos los usuarios de la base de datos.
        public function get_usuario(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM t_usuario WHERE est = 1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para insertar un nuevo usuario en la base de datos.
        public function insert_usuario($usu_correo, $usu_nombre, $usu_pass){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO t_usuario (usu_id, usu_correo, usu_nombre, usu_pass, est) VALUES (NULL, ?, ?, ?, '1')";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_correo);
            $sql->bindValue(2, $usu_nombre);
            $sql->bindValue(3, $usu_pass);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para actualizar un usuario existente en la base de datos.
        public function update_usuario($usu_id, $usu_correo, $usu_nombre, $usu_pass){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE t_usuario SET
                    usu_correo = ?,
                    usu_nombre = ?,
                    usu_pass = ?
                    WHERE usu_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_correo);
            $sql->bindValue(2, $usu_nombre);
            $sql->bindValue(3, $usu_pass);
            $sql->bindValue(4, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para eliminar un usuario de la base de datos.
        public function delete_usuario($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE t_usuario SET est = 0 WHERE usu_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para obtener un usuario específico de la base de datos.
        public function get_usuario_x_id($usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM t_usuario WHERE usu_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }
?>