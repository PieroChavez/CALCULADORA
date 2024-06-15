<?php

class ControladorPresTerreno{


    /* ===========================================
    REGISTRO DE PRESUPUESTO TER
    =========================================== */

    static public function ctrCrearPresTerreno()
    {

        if (isset($_POST["nuevoTerronoMC"])) {

            if (preg_match('/^[0-9.]+$/', $_POST["nuevoTerronoMC"])) {

                $tabla = "terreno";

                $datos = array(
                    "id_proyecto" => $_POST["idProyectoT"],
                    "medida" => $_POST["nuevoTerronoMC"],
                    "precio" => $_POST["nuevoTerrenoPMC"],
                    "total" => $_POST["resultadoTerreno"]
                );

                $respuesta = ModeloPresTerreno::mdlIngresarPresTerreno($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El presupuesto terreno ha sido agregado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        var palabra = "presTerreno";
                                        
                                        window.location = "presupuestos?palabra=" + palabra;
                                    }
                                });    
                            </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡La terreno en metros cuadrados no puede ir vacio o llevar caracteres especiales!",
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
    MOSTRAR PRESUPUESTO TER
    =========================================== */

    static public function ctrMostrarPresTerreno($item, $valor)
    {

        $tablaP = "proyecto";
        $tablaT = "terreno";
        $respuesta = ModeloPresTerreno::mdlMostrarPresTerreno($tablaP, $tablaT, $item, $valor);

        return $respuesta;
    }


    /* ===========================================
    BORRAR DE PRESUPUESTO TER
    =========================================== */

    static public function ctrBorrarPresTerreno()
    {

        if (isset($_GET["idPresTrabajador"])) {
            $tabla = "pres_trabajadores";
            $datos = $_GET["idPresTrabajador"];

            $respuesta = ModeloPresTrabajador::mdlBorrarPesTrabajador($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El trabajador ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "presupuestos"
                            }
                        })
                        </script>';
            }
        }
    }
}
