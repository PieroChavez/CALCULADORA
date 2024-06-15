<?php

require_once "conexion.php";

class ModeloPresTerreno{

    /* ===========================================
    MOSTRAR PRESUPUESTO TERRENO
    =========================================== */

	static public function mdlMostrarPresTerreno($tablaP, $tablaT, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaP INNER JOIN $tablaT ON $tablaP.id_proyecto  = $tablaT.id_proyecto  WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaP INNER JOIN $tablaT ON $tablaP.id_proyecto  = $tablaT.id_proyecto ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR PRESUPUESTO TERRENO
    =========================================== */

	static public function mdlIngresarPresTerreno($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                id_proyecto, 
                                                                medida, 
                                                                precio,
                                                                total) 
                                                                VALUES (
                                                                    :id_proyecto, 
                                                                    :medida, 
                                                                    :precio, 
                                                                    :total)");

		$stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
		$stmt->bindParam(":medida", $datos["medida"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}


    /* ===========================================
    BORRAR PRESUPUESTO TERRENO
    =========================================== */

    static public function mdlBorrarPesTerreno($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_pres_trab = :id_pres_trab");
        $stmt->bindParam(":id_pres_trab",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}