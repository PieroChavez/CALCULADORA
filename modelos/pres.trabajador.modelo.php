<?php

require_once "conexion.php";

class ModeloPresTrabajador{

    /* ===========================================
    MOSTRAR PRESUPUESTO TRABAJADOR
    =========================================== */

	static public function mdlMostrarPresTrabajador($tablaT, $tablaPT, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaT INNER JOIN $tablaPT ON $tablaT.id_trabajador = $tablaPT.id_trabajador WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaT INNER JOIN $tablaPT ON $tablaT.id_trabajador = $tablaPT.id_trabajador");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR PRESUPUESTO TRABAJADOR
    =========================================== */

	static public function mdlIngresarPresTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                id_proyecto, 
                                                                id_trabajador, 
                                                                tiempo_trabajo, 
                                                                sueldo_acordado,
                                                                cantidad_tiempo,
                                                                costo_total_trab) 
                                                                VALUES (
                                                                    :id_proyecto, 
                                                                    :id_trabajador, 
                                                                    :tiempo_trabajo, 
                                                                    :sueldo_acordado, 
                                                                    :cantidad_tiempo, 
                                                                    :costo_total_trab)");

		$stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);
		$stmt->bindParam(":tiempo_trabajo", $datos["tiempo_trabajo"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo_acordado", $datos["sueldo_acordado"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_tiempo", $datos["cantidad_tiempo"], PDO::PARAM_INT);
		$stmt->bindParam(":costo_total_trab", $datos["costo_total_trab"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}


    /* ===========================================
    BORRAR PRESUPUESTO TRABAJADOR
    =========================================== */

    static public function mdlBorrarPesTrabajador($tabla, $datos){

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