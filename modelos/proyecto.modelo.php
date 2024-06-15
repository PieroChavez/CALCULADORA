<?php

require_once "conexion.php";

class ModeloProyecto{

    /* ===========================================
    MOSTRAR PROYECTO
    =========================================== */

	static public function mdlMostrarProyectos($tablaC, $tablaP, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaC INNER JOIN $tablaP ON $tablaC.id_cliente = $tablaP.id_cliente WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaC INNER JOIN $tablaP ON $tablaC.id_cliente = $tablaP.id_cliente");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR PROYECTO
    =========================================== */

	static public function mdlIngresarProyecto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                    id_cliente, 
                                                                    nombre_proyecto, 
                                                                    ubicacion_proyecto,	
                                                                    fecha_proyecto,	
                                                                    descri_proyecto) 
                                                                    VALUES (
                                                                        :id_cliente, 
                                                                        :nombre_proyecto, 
                                                                        :ubicacion_proyecto,	
                                                                        :fecha_proyecto, 
                                                                        :descri_proyecto
                                                                        )");

		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_proyecto", $datos["nombre_proyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":ubicacion_proyecto", $datos["ubicacion_proyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_proyecto", $datos["fecha_proyecto"], PDO::PARAM_STR);
		$stmt->bindParam(":descri_proyecto", $datos["descri_proyecto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}


}