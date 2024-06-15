<?php

require_once "conexion.php";

class ModeloPresupuesto{

    /* ===========================================
    MOSTRAR PRESUPUESTO
    =========================================== */

	static public function mdlMostrarPresupuestoSumaParcial($tablaPresM, $tablaPresT, $tablaTerreno, $tablaPres, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaPres
                                                    INNER JOIN $tablaPresM ON $tablaPres.id_pres_mat = $tablaPresM.id_pres_mat
                                                    INNER JOIN $tablaPresT ON $tablaPres.id_pres_trab = $tablaPresT.id_pres_trab
                                                    INNER JOIN $tablaTerreno ON $tablaPres.id_terreno = $tablaTerreno.id_terreno
                                                    WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaPres
                                                    INNER JOIN $tablaPresM ON $tablaPres.id_pres_mat = $tablaPresM.id_pres_mat
                                                    INNER JOIN $tablaPresT ON $tablaPres.id_pres_trab = $tablaPresT.id_pres_trab
                                                    INNER JOIN $tablaTerreno ON $tablaPres.id_terreno = $tablaTerreno.id_terreno");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}

    /* ===========================================
    VER PRESUPUESTO
    =========================================== */

	static public function mdlVerPresupuesto($tablaProyecto, $tablaPresMaterial, $tablaPresTrabajador, $tablaCliente, $tablaTerreno, $tablaPresupuesto, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT
                                                    $tablaProyecto.id_proyecto,
                                                    $tablaCliente.nombre_cliente,
                                                    $tablaCliente.telefono_cliente,
                                                    $tablaCliente.correo_cliente,
                                                    $tablaProyecto.nombre_proyecto,
                                                    $tablaProyecto.ubicacion_proyecto,
                                                    $tablaProyecto.fecha_proyecto,
                                                    $tablaProyecto.descri_proyecto,
                                                    (SELECT SUM($tablaPresMaterial.costo_total) FROM pres_materiales WHERE $tablaProyecto.id_proyecto = $tablaPresMaterial.id_proyecto) AS suma_costo_total_materiales,
                                                    (SELECT SUM($tablaPresTrabajador.costo_total_trab) FROM pres_trabajadores WHERE $tablaProyecto.id_proyecto = $tablaPresTrabajador.id_proyecto) AS suma_costo_total_trabajadores,
                                                    (SELECT SUM($tablaTerreno.total) FROM terreno WHERE $tablaProyecto.id_proyecto = $tablaTerreno.id_proyecto) AS suma_total_terreno,
                                                    $tablaPresupuesto.porcentaje_ganancia,
                                                    $tablaPresupuesto.costo_parcial,
                                                    $tablaPresupuesto.costo_final,
                                                    $tablaPresupuesto.fecha_presupuesto
                                                FROM $tablaProyecto
                                                JOIN $tablaPresMaterial ON $tablaProyecto.id_proyecto = $tablaPresMaterial.id_proyecto
                                                JOIN $tablaPresTrabajador ON $tablaProyecto.id_proyecto = $tablaPresTrabajador.id_proyecto
                                                JOIN $tablaCliente ON $tablaProyecto.id_cliente = cliente.id_cliente
                                                JOIN $tablaTerreno ON $tablaProyecto.id_proyecto = $tablaTerreno.id_proyecto
                                                JOIN $tablaPresupuesto ON $tablaProyecto.id_proyecto = $tablaPresupuesto.id_proyecto
                                                WHERE $tablaProyecto.id_proyecto = :$item GROUP BY $tablaProyecto.id_proyecto
                                                ");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT
                                                $tablaProyecto.id_proyecto,
                                                $tablaCliente.nombre_cliente,
                                                $tablaCliente.telefono_cliente,
                                                $tablaCliente.correo_cliente,
                                                $tablaProyecto.nombre_proyecto,
                                                $tablaProyecto.ubicacion_proyecto,
                                                $tablaProyecto.fecha_proyecto,
                                                $tablaProyecto.descri_proyecto,
                                                (SELECT SUM($tablaPresMaterial.costo_total) FROM pres_materiales WHERE $tablaProyecto.id_proyecto = $tablaPresMaterial.id_proyecto) AS suma_costo_total_materiales,
                                                (SELECT SUM($tablaPresTrabajador.costo_total_trab) FROM pres_trabajadores WHERE $tablaProyecto.id_proyecto = $tablaPresTrabajador.id_proyecto) AS suma_costo_total_trabajadores,
                                                (SELECT SUM($tablaTerreno.total) FROM terreno WHERE $tablaProyecto.id_proyecto = $tablaTerreno.id_proyecto) AS suma_total_terreno,
                                                $tablaPresupuesto.porcentaje_ganancia,
                                                $tablaPresupuesto.costo_parcial,
                                                $tablaPresupuesto.costo_final,
                                                $tablaPresupuesto.fecha_presupuesto
                                            FROM $tablaProyecto
                                            JOIN $tablaPresMaterial ON $tablaProyecto.id_proyecto = $tablaPresMaterial.id_proyecto
                                            JOIN $tablaPresTrabajador ON $tablaProyecto.id_proyecto = $tablaPresTrabajador.id_proyecto
                                            JOIN $tablaCliente ON $tablaProyecto.id_cliente = cliente.id_cliente
                                            JOIN $tablaTerreno ON $tablaProyecto.id_proyecto = $tablaTerreno.id_proyecto
                                            JOIN $tablaPresupuesto ON $tablaProyecto.id_proyecto = $tablaPresupuesto.id_proyecto
                                            GROUP BY $tablaProyecto.id_proyecto
                                            ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
		
		$stmt = null;

	}


    /* ===========================================
    REGISTRAR PRESUPUESTO
    =========================================== */

	static public function mdlIngresarPresupuesto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
                                                                id_proyecto, 
                                                                porcentaje_ganancia, 
                                                                costo_parcial, 
                                                                costo_final) 
                                                                VALUES (
                                                                    :id_proyecto, 
                                                                    :porcentaje_ganancia, 
                                                                    :costo_parcial, 
                                                                    :costo_final)");

		$stmt->bindParam(":id_proyecto", $datos["id_proyecto"], PDO::PARAM_INT);
		$stmt->bindParam(":porcentaje_ganancia", $datos["porcentaje_ganancia"], PDO::PARAM_STR);
		$stmt->bindParam(":costo_parcial", $datos["costo_parcial"], PDO::PARAM_STR);
		$stmt->bindParam(":costo_final", $datos["costo_final"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		
		$stmt = null;

	}


    /* ===========================================
    BORRAR PRESUPUESTO
    =========================================== */

    static public function mdlBorrarPresupuesto($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_proyecto = :id_proyecto");

        $stmt->bindParam(":id_proyecto",$datos, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt=null;

    }


}