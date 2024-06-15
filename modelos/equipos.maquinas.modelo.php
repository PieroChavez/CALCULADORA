<?php

require_once "conexion.php";

class ModeloEquiposMaquinarias{

    /* ===========================================
    MOSTRAR EQUIPOS Y MAQUINARIAS
    =========================================== */

	static public function mdlMostrarEquiposMaquinarias($tablaT, $tablaE, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaT INNER JOIN $tablaE ON $tablaT.id_trabajador = $tablaE.id_trabajador WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaT INNER JOIN $tablaE ON $tablaT.id_trabajador = $tablaE.id_trabajador");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    REGISTRAR EQUIPOS Y MAQUINARIAS
    =========================================== */

	static public function mdlIngresarEquipoMaquina($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                nombre_em, 
                                                                tipo_em, 
                                                                cantidad_em,	
                                                                modelo_em,	
                                                                ultimo_uso_em, 
                                                                id_trabajador) 
                                                                VALUES (
                                                                :nombre_em, 
                                                                :tipo_em, 
                                                                :cantidad_em,	
                                                                :modelo_em, 
                                                                :ultimo_uso_em, 
                                                                :id_trabajador)");

		$stmt->bindParam(":nombre_em", $datos["nombre_em"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_em", $datos["tipo_em"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad_em", $datos["cantidad_em"], PDO::PARAM_INT);
		$stmt->bindParam(":modelo_em", $datos["modelo_em"], PDO::PARAM_STR);
		$stmt->bindParam(":ultimo_uso_em", $datos["ultimo_uso_em"], PDO::PARAM_STR);
		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}

    /* ===========================================
    EDITAR EQUIPOS Y MAQUINARIAS
    =========================================== */

    static public function mdlEditarEquipoMaquina($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                                                            nombre_em = :nombre_em, 
                                                            tipo_em = :tipo_em, 
                                                            cantidad_em = :cantidad_em, 
                                                            modelo_em = :modelo_em, 
                                                            ultimo_uso_em = :ultimo_uso_em, 
                                                            id_trabajador = :id_trabajador
                                                            WHERE id_em = :id_em");

        $stmt->bindParam(":nombre_em", $datos["nombre_em"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_em", $datos["tipo_em"], PDO::PARAM_STR);
        $stmt->bindParam(":cantidad_em", $datos["cantidad_em"], PDO::PARAM_INT);
        $stmt->bindParam(":modelo_em", $datos["modelo_em"], PDO::PARAM_STR);
        $stmt->bindParam(":ultimo_uso_em", $datos["ultimo_uso_em"], PDO::PARAM_STR);
        $stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);
        $stmt->bindParam(":id_em", $datos["id_em"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }


    /* ===========================================
    BORRAR EQUIPOS Y MAQUINARIAS
    =========================================== */

    static public function mdlBorrarEquipoMaquina($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_em = :id_em");
        $stmt->bindParam(":id_em",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}