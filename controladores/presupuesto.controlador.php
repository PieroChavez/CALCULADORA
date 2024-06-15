<?php

class ControladorPresupuesto{


    /* ===========================================
    REGISTRO DE PRESUPUESTO 
    =========================================== */

    static public function ctrCrearPresupuesto()
    {

        if (isset($_POST["nuevoPorc"])) {

            if (preg_match('/^[0-9.]+$/', $_POST["nuevoPorc"])) {

                $tabla = "presupuesto";

                $datos = array(
                    "id_proyecto" => $_POST["idProyectoT"],
                    "porcentaje_ganancia" => $_POST["nuevoPorc"],
                    "costo_parcial" => $_POST["nuevoSumaPar"],
                    "costo_final" => $_POST["presupuestoFinal"]
                );

                $respuesta = ModeloPresupuesto::mdlIngresarPresupuesto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El presupuesto ha sido agregado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        var palabra = "presPresupuesto";
                                        
                                        window.location = "verPresupuestos?palabra=" + palabra;
                                    }
                                });    
                            </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡La cantidad no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "presupuestos";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR PRESUPUESTO 
    =========================================== */

    static public function ctrMostrarPresupuesto($item, $valor)
    {

        $tablaT = "trabajador";
        $tablaPT = "pres_trabajadores";
        $respuesta = ModeloPresTrabajador::mdlMostrarPresTrabajador($tablaT, $tablaPT, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    MOSTRAR PRESUPUESTO 
    =========================================== */

    static public function ctrVerPresupuesto($item, $valor)
    {

        $tablaProyecto = "proyecto";
        $tablaPresMaterial = "pres_materiales";
        $tablaPresTrabajador = "pres_trabajadores";
        $tablaCliente = "cliente";
        $tablaTerreno = "terreno";
        $tablaPresupuesto = "presupuesto";
        $respuesta = ModeloPresupuesto::mdlVerPresupuesto($tablaProyecto, $tablaPresMaterial, $tablaPresTrabajador, $tablaCliente, $tablaTerreno, $tablaPresupuesto, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    MOSTRAR PRESUPUESTO SUMAR PARCIAL
    =========================================== */

    static public function ctrMostrarPresupuestoSumaParcial($item, $valor)
    {

        $tablaPresM = "pres_materiales";
        $tablaPresT = "pres_trabajadores";
        $tablaTerreno = "terreno";
        $tablaPres = "persupuesto";
        $respuesta = ModeloPresupuesto::mdlMostrarPresupuestoSumaParcial($tablaPresM, $tablaPresT, $tablaTerreno, $tablaPres, $item, $valor);

        return $respuesta;
    }


    /* ===========================================
    BORRAR DE PRESUPUESTO 
    =========================================== */

    static public function ctrBorrarPresupuesto()
    {

        if (isset($_GET["idPresupuesto"])) {
            $tabla = "proyecto";
            $datos = $_GET["idPresupuesto"];

            $respuesta = ModeloPresupuesto::mdlBorrarPresupuesto($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El presupuesto ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "verPresupuestos"
                            }
                        })
                        </script>';
            }
        }
    }
}
