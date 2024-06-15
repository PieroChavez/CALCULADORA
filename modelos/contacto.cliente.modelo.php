<?php

require_once "conexion.php";

class ModeloContacto{

    /* ===========================================
    MOSTRAR   CONTACTO
    =========================================== */

	static public function mdlMostrarContacto($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR  CONTACTO
    =========================================== */

	static public function mdlIngresarContacto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_contacto, apellidos_contacto, telefono_contacto, correo_contacto) VALUES (:nombre_contacto, :apellidos_contacto, :telefono_contacto, :correo_contacto)");

		$stmt->bindParam(":nombre_contacto", $datos["nombre_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos_contacto", $datos["apellidos_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_contacto", $datos["telefono_contacto"], PDO::PARAM_STR);
		$stmt->bindParam(":correo_contacto", $datos["correo_contacto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}

    /* ===========================================
    EDITAR  CONTACTO
    =========================================== */

    static public function mdlEditarContacto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_contacto = :nombre_contacto, apellidos_contacto = :apellidos_contacto, telefono_contacto = :telefono_contacto, correo_contacto = :correo_contacto WHERE id_proveedor = :id_proveedor");
        $stmt->bindParam(":nombre_contacto", $datos["nombre_contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidos_contacto", $datos["apellidos_contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_contacto", $datos["telefono_contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":correo_contacto", $datos["correo_contacto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }


    /* ===========================================
    BORRAR  CONTACTO
    =========================================== */

    static public function mdlBorrarContacto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_proveedor = :id_proveedor");
        $stmt->bindParam(":id_proveedor",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}