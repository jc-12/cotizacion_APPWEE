<?php
    // Inicia o reanuda una sesión de PHP.
    session_start();

    // Define la clase "Conectar".
    class Conectar{

        // Variable protegida para almacenar la conexión a la base de datos.
        protected $dbh;

        // Función para realizar la conexión a la base de datos.
        protected function Conexion(){
            try {
                // Establece la conexión a la base de datos usando PDO.
                $conectar = $this->dbh = new PDO("mysql:host=127.0.0.1;dbname=Cotizador","root","");
                // Retorna el objeto PDO con la conexión establecida.
                return $conectar;
            } catch (Exception $e) {
                // Si ocurre un error durante la conexión, muestra el mensaje de error y termina el script.
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        // Función para configurar la codificación de caracteres.
        public function set_names(){
            // Ejecuta la consulta para configurar la codificación de caracteres a "utf8".
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        // Función para obtener la ruta de la aplicación.
        public static function ruta(){
            // Retorna la ruta de la aplicación en el servidor web.
            return "http://localhost/cotizacion_APPWEE/";
        }
    }
?>
