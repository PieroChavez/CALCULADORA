<?php

require_once "conexion.php";

class ModeloTrabajadores{

    /* ===========================================
    MOSTRAR TRABAJADOR
    =========================================== */

	static public function mdlMostrarTrabajadores($tabla, $item, $valor){

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
    REGISTRAR TRABAJADOR
    =========================================== */

	static public function mdlIngresarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                    nombre_trabajador, 
                                                                    especialidad_trabajador, 
                                                                    dni_trabajador, 
                                                                    telefono_trabajador,
                                                                    funcion_trabajador,
                                                                    tiempo_trab_trabajador,
                                                                    sueldo_men_trabajador,
                                                                    sueldo_sem_trabajador,
                                                                    sueldo_dia_trabajador,
                                                                    sueldo_proyecto
                                                                    ) 
                                                                    VALUES (:nombre_trabajador, 
                                                                            :especialidad_trabajador, 
                                                                            :dni_trabajador, 
                                                                            :telefono_trabajador,
                                                                            :funcion_trabajador,
                                                                            :tiempo_trab_trabajador,
                                                                            :sueldo_men_trabajador,
                                                                            :sueldo_sem_trabajador,
                                                                            :sueldo_dia_trabajador,
                                                                            :sueldo_proyecto
                                                                            )");

		$stmt->bindParam(":nombre_trabajador", $datos["nombre_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":especialidad_trabajador", $datos["especialidad_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":dni_trabajador", $datos["dni_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono_trabajador", $datos["telefono_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":funcion_trabajador", $datos["funcion_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":tiempo_trab_trabajador", $datos["tiempo_trab_trabajador"], PDO::PARAM_INT);
		$stmt->bindParam(":sueldo_men_trabajador", $datos["sueldo_men_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo_sem_trabajador", $datos["sueldo_sem_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo_dia_trabajador", $datos["sueldo_dia_trabajador"], PDO::PARAM_STR);
		$stmt->bindParam(":sueldo_proyecto", $datos["sueldo_proyecto"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}

    /* ===========================================
    EDITAR TRABAJADOR
    =========================================== */

    static public function mdlEditarTrabajador($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
                                                            nombre_trabajador = :nombre_trabajador, 
                                                            especialidad_trabajador = :especialidad_trabajador, 
                                                            dni_trabajador = :dni_trabajador, 
                                                            telefono_trabajador = :telefono_trabajador,
                                                            funcion_trabajador = :funcion_trabajador,
                                                            tiempo_trab_trabajador = :tiempo_trab_trabajador,
                                                            sueldo_men_trabajador = :sueldo_men_trabajador,
                                                            sueldo_sem_trabajador = :sueldo_sem_trabajador,
                                                            sueldo_dia_trabajador = :sueldo_dia_trabajador,
                                                            sueldo_proyecto = :sueldo_proyecto
                                                            WHERE id_trabajador = :id_trabajador");

        $stmt->bindParam(":nombre_trabajador", $datos["nombre_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":especialidad_trabajador", $datos["especialidad_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":dni_trabajador", $datos["dni_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono_trabajador", $datos["telefono_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":funcion_trabajador", $datos["funcion_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":tiempo_trab_trabajador", $datos["tiempo_trab_trabajador"], PDO::PARAM_INT);
        $stmt->bindParam(":sueldo_men_trabajador", $datos["sueldo_men_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":sueldo_sem_trabajador", $datos["sueldo_sem_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":sueldo_dia_trabajador", $datos["sueldo_dia_trabajador"], PDO::PARAM_STR);
        $stmt->bindParam(":sueldo_proyecto", $datos["sueldo_proyecto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt = null;

    }


    /* ===========================================
    BORRAR TRABAJADOR
    =========================================== */

    static public function mdlBorrarTrabajador($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_trabajador = :id_trabajador");
        $stmt->bindParam(":id_trabajador",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}