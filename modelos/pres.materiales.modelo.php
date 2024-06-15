<?php

require_once "conexion.php";

class ModeloPresMaterial{

    /* ===========================================
    MOSTRAR PRESUPUESTO MATERIAL
    =========================================== */

	static public function mdlMostrarPresMaterial($tablaM, $tablaPM, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaM INNER JOIN $tablaPM ON $tablaM.id_material = $tablaPM.id_material WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaM INNER JOIN $tablaPM ON $tablaM.id_material = $tablaPM.id_material");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR PRESUPUESTO MATERIAL
    =========================================== */

	static public function mdlIngresarPresMaterial($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                id_proyecto, 
                                                                id_material, 
                                                                cantidad_utilizada, 
                                                                costo_total) 
                                                                VALUES (
                                                                    :id_proyecto, 
                                                                    :id_material, 
                                                                    :cantidad_utilizada, 
                                                                    :costo_total)");

		$stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
		$stmt->bindParam(":id_material", $datos["id_material"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad_utilizada", $datos["cantidad_utilizada"], PDO::PARAM_INT);
		$stmt->bindParam(":costo_total", $datos["costo_total"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}


    /* ===========================================
    BORRAR PRESUPUESTO MATERIAL
    =========================================== */

    static public function mdlBorrarPesMaterial($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pres_mat = :id_pres_mat");
        $stmt->bindParam(":id_pres_mat",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}