<?php

class ControladorProveedores{


    /* ===========================================
    REGISTRO DE PROVEEDOR
    =========================================== */

    static public function ctrCrearProveedor()
    {

        if (isset($_POST["nuevoNombre"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombre"])) {

                $tabla = "proveedor";

                $datos = array(
                    "nombre_proveedor" => $_POST["nuevoNombre"],
                    "telefono_proveedor" => $_POST["nuevoTelefono"],
                    "correo_proveedor" => $_POST["nuevoCorreo"],
                    "direccion_proveedor" => $_POST["nuevoDireccion"]
                );

                $respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El proveedor ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "proveedores";
                                    }
                                });    
                            </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "proveedores";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR PROVEEDOR
    =========================================== */

    static public function ctrMostrarProveedor($item, $valor)
    {

        $tabla = "proveedor";
        $respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR DE PROVEEDOR
    =========================================== */

    static public function ctrEditarProveedor()
    {

        if (isset($_POST["editarNombre"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                $tabla = "proveedor";

                $datos = array(
                    "id_proveedor" => $_POST["idProveedor"],
                    "nombre_proveedor" => $_POST["editarNombre"],
                    "telefono_proveedor" => $_POST["editarTelefono"],
                    "correo_proveedor" => $_POST["editarCorreo"],
                    "direccion_proveedor" => $_POST["editarDireccion"]
                );


                $respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                type: "success",
                                title: "¡El usuario ha sido editado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "proveedores";
                                }
                            });    
                        </script>';
                }
            } else {


                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del proveedor no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "proveedores";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    BORRAR DE PROVEEDOR
    =========================================== */

    static public function ctrBorrarProveedor()
    {

        if (isset($_GET["idProveedor"])) {
            $tabla = "proveedor";
            $datos = $_GET["idProveedor"];

            $respuesta = ModeloProveedores::mdlBorrarProveedor($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El proveedor ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "proveedores"
                            }
                        })
                        </script>';
            }
        }
    }
}
