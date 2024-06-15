<?php

class ControladorPresTrabajadores{


    /* ===========================================
    REGISTRO DE PRESUPUESTO TRABAJADORES
    =========================================== */

    static public function ctrCrearPresTrabajador()
    {

        if (isset($_POST["nuevoCantidadTT"])) {

            if (preg_match('/^[0-9.]+$/', $_POST["nuevoCantidadTT"])) {

                $tabla = "pres_trabajadores";

                $datos = array(
                    "id_proyecto" => $_POST["idProyectoT"],
                    "id_trabajador" => $_POST["idTrabajadores"],
                    "tiempo_trabajo" => $_POST["sueldoPorTiempo"],
                    "sueldo_acordado" => $_POST["nuevoSueldoT"],
                    "cantidad_tiempo" => $_POST["nuevoCantidadTT"],
                    "costo_total_trab" => $_POST["resultadoSumaT"]
                );

                $respuesta = ModeloPresTrabajador::mdlIngresarPresTrabajador($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El trabajador ha sido agregado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        var palabra = "nuevoPresTrabajador";
                                        
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
    MOSTRAR PRESUPUESTO TRABAJADORES
    =========================================== */

    static public function ctrMostrarPresTrabajador($item, $valor)
    {

        $tablaT = "trabajador";
        $tablaPT = "pres_trabajadores";
        $respuesta = ModeloPresTrabajador::mdlMostrarPresTrabajador($tablaT, $tablaPT, $item, $valor);

        return $respuesta;
    }


    /* ===========================================
    BORRAR DE PRESUPUESTO TRABAJADORES
    =========================================== */

    static public function ctrBorrarPresTrabajador()
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
                                window.location = "presupuestos?palabra=nuevoPresTrabajador"
                            }
                        })
                        </script>';
            }
        }
    }
}
