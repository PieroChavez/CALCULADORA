<?php

class ControladorPresMateriales{


    /* ===========================================
    REGISTRO DE PRESUPUESTO MATERIAL
    =========================================== */

    static public function ctrCrearPresMaterial()
    {

        if (isset($_POST["nuevoCantidadM"])) {

            if (preg_match('/^[0-9.]+$/', $_POST["nuevoCantidadM"])) {

                $tabla = "pres_materiales";

                $datos = array(
                    "id_proyecto" => $_POST["idProyectoM"],
                    "id_material" => $_POST["idMateriales"],
                    "cantidad_utilizada" => $_POST["nuevoCantidadM"],
                    "costo_total" => $_POST["resultadoSuma"]
                );

                $respuesta = ModeloPresMaterial::mdlIngresarPresMaterial($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El material ha sido agregado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                    var palabra = "nuevoPresMaterial";
                                    
                                    window.location = "presupuestos?palabra="+palabra;
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
    MOSTRAR PRESUPUESTO MATERIAL
    =========================================== */

    static public function ctrMostrarPresMaterial($item, $valor)
    {

        $tablaM = "material";
        $tablaPM = "pres_materiales";
        $respuesta = ModeloPresMaterial::mdlMostrarPresMaterial($tablaM, $tablaPM, $item, $valor);

        return $respuesta;
    }


    /* ===========================================
    BORRAR DE PRESUPUESTO MATERIAL
    =========================================== */

    static public function ctrBorrarPresMaterial()
    {

        if (isset($_GET["idPresMaterial"])) {
            $tabla = "pres_materiales";
            $datos = $_GET["idPresMaterial"];

            $respuesta = ModeloPresMaterial::mdlBorrarPesMaterial($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El material ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "presupuestos?palabra=nuevoPresMaterial"
                            }
                        })
                        </script>';
            }
        }
    }
}
