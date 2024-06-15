<?php

class Conexion {
    static public function conectar() {
        try {
            $link = new PDO("mysql:host=localhost;dbname=sis_presupuestos", "root", "");
            $link->exec("set names utf8");
            return $link;
        } catch (PDOException $e) {
            // En caso de error, mostrar un mensaje personalizado
            die("No se realizó la conexión a la base de datos: " . $e->getMessage());
        }
    }
}
