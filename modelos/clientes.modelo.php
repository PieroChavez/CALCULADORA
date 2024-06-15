<?php

require_once "conexion.php";

class ModeloClientes{

    /* ===========================================
    MOSTRAR CLIENTES
    =========================================== */

	static public function mdlMostrarClientes($tabla, $item, $valor){

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
    REGISTRAR CLIENTE
    =========================================== */

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_cliente, telefono_cliente, correo_cliente, contacto_em_cliente) VALUES (:nombre_cliente, :telefono_cliente, :correo_cliente, :contacto_em_cliente)");

		$stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":correo_cliente", $datos["correo_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":contacto_em_cliente", $datos["contacto_em_cliente"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}

    /* ===========================================
    EDITAR CLIENTE
    =========================================== */

    static public function mdlEditarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        nombre_cliente = :nombre_cliente, 
        telefono_cliente = :telefono_cliente, 
        correo_cliente = :correo_cliente, 
        contacto_em_cliente = :contacto_em_cliente WHERE id_cliente = :id_cliente");
        $stmt->bindParam(":nombre_cliente", $datos["nombre_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_cliente", $datos["telefono_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":correo_cliente", $datos["correo_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":contacto_em_cliente", $datos["contacto_em_cliente"], PDO::PARAM_STR);
        $stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }


    /* ===========================================
    BORRAR CLIENTE
    =========================================== */

    static public function mdlBorrarCliente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id_cliente");
        $stmt->bindParam(":id_cliente",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}