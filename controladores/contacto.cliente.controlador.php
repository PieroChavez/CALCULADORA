<?php

class ControladorContactos{


    /* ===========================================
    REGISTRO DE CONTACTO
    =========================================== */

    static public function ctrCrearContacto()
    {

        if (isset($_POST["nuevoNombreCl"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombreCl"])) {

                $tabla = "contacto_cliente";

                $datos = array(
                    "nombre_contacto" => $_POST["nuevoNombreCl"],
                    "apellidos_contacto" => $_POST["nuevoApellidoCl"],
                    "telefono_contacto" => $_POST["nuevoTelefonoCl"],
                    "correo_contacto" => $_POST["nuevoCorreoCl"]
                );

                $respuesta = ModeloContacto::mdlIngresarContacto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡Enviado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "inicio";
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
                                window.location = "inicio";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR CONTACTO
    =========================================== */

    static public function ctrMostrarContacto($item, $valor)
    {

        $tabla = "contacto_cliente";
        $respuesta = ModeloContacto::mdlMostrarContacto($tabla, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR DE CONTACTO
    =========================================== */

    static public function ctrEditarContacto()
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
    BORRAR DE CONTACTO
    =========================================== */

    static public function ctrBorrarContacto()
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
