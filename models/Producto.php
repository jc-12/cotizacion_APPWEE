<?php
    class Producto extends Conectar{

        // TODO: Función para obtener todos los productos de la base de datos.
        public function get_producto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT 
                tm_producto.prod_id,
                tm_producto.cat_id,
                tm_producto.prod_nom,
                tm_producto.prod_descrip,
                tm_producto.prod_precio,
                tm_categoria.cat_nom,
                tm_categoria.cat_descrip
                FROM tm_producto
                INNER JOIN tm_categoria
                ON tm_producto.cat_id = tm_categoria.cat_id 
                WHERE tm_producto.prod_estado = 1
                AND tm_categoria.cat_est=1";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para insertar un nuevo producto en la base de datos.
        public function insert_producto($cat_id, $prod_nom, $prod_descrip, $prod_precio){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO tm_producto (prod_id, cat_id, prod_nom, prod_descrip, prod_precio, prod_estado) VALUES (NULL, ?, ?, ?, ?, '1')";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->bindValue(2, $prod_nom);
            $sql->bindValue(3, $prod_descrip);
            $sql->bindValue(4, $prod_precio);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para actualizar un producto existente en la base de datos.
     // TODO: Función para actualizar un producto existente en la base de datos.
     public function update_producto($prod_id, $cat_id, $prod_nom, $prod_descrip, $prod_precio){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_producto SET
                cat_id = ?,
                prod_nom = ?,
                prod_descrip = ?,
                prod_precio = ?
                WHERE prod_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->bindValue(2, $prod_nom);
        $sql->bindValue(3, $prod_descrip);
        $sql->bindValue(4, $prod_precio);
        $sql->bindValue(5, $prod_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

        // TODO: Función para eliminar un producto de la base de datos.
        public function delete_producto($prod_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE tm_producto SET prod_estado = 0 WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        // TODO: Función para obtener un producto específico de la base de datos.
        public function get_producto_x_id($prod_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $prod_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_producto_x_categoria($cat_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM tm_producto WHERE cat_id = ? AND prod_estado=1";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }
?>
