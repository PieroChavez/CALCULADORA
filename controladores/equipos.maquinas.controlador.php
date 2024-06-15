<?php

class ControladorEquiposMaquinarias{


    /* ===========================================
    REGISTRO EQUIPOS Y MATERIALES
    =========================================== */

    static public function ctrCrearEquipoMaquinaria()
    {

        if (isset($_POST["nuevoNombreEM"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombreEM"])) {

                $tabla = "equipo_maqui";

                $datos = array(
                    "nombre_em" => $_POST["nuevoNombreEM"],
                    "tipo_em" => $_POST["nuevoTipoEM"],
                    "cantidad_em" => $_POST["nuevoCantidadEM"],
                    "modelo_em" => $_POST["nuevoModeloEM"],
                    "ultimo_uso_em" => $_POST["nuevoUltimoUsoEM"],
                    "id_trabajador" => $_POST["nuevoEncargadoEM"]);

                $respuesta = ModeloEquiposMaquinarias::mdlIngresarEquipoMaquina($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El equipo o máquina ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "equiposMaquinarias";
                                    }
                                });    
                            </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del equipo o máquina no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "equiposMaquinarias";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR EQUIPOS Y MATERIALES
    =========================================== */

    static public function ctrMostrarEquiposMaquinarias($item, $valor)
    {

        $tablaT = "trabajador";
        $tablaE = "equipo_maqui";
        $respuesta = ModeloEquiposMaquinarias::mdlMostrarEquiposMaquinarias($tablaT, $tablaE, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR EQUIPOS Y MATERIALES
    =========================================== */

    static public function ctrEditarEquipoMaterial()
    {

        if (isset($_POST["editarNombreEM"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreEM"])) {

                $tabla = "equipo_maqui";

                $datos = array(
                    "id_em" => $_POST["idEM"],
                    "nombre_em" => $_POST["editarNombreEM"],
                    "tipo_em" => $_POST["editarTipoEM"],
                    "cantidad_em" => $_POST["editarCantidadEM"],
                    "modelo_em" => $_POST["editarModeloEM"],
                    "ultimo_uso_em" => $_POST["editarUltimoUsoEM"],
                    "id_trabajador" => $_POST["editarTrabajadorEM"]
                );


                $respuesta = ModeloEquiposMaquinarias::mdlEditarEquipoMaquina($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                type: "success",
                                title: "¡El equipo o  maquinaria ha sido editado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "equiposMaquinarias";
                                }
                            });    
                        </script>';
                }
            } else {


                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del equipo o  maquinaria no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "equiposMaquinarias";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    BORRAR EQUIPOS Y MATERIALES
    =========================================== */

    static public function ctrBorrarEquipoMaquina()
    {

        if (isset($_GET["idEM"])) {
            $tabla = "equipo_maqui";
            $datos = $_GET["idEM"];

            $respuesta = ModeloEquiposMaquinarias::mdlBorrarEquipoMaquina($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El equipo o máquina ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "equiposMaquinarias"
                            }
                        })
                        </script>';
            }
        }
    }
}
