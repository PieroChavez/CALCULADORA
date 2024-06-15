<?php

class ControladorClientes{


    /* ===========================================
    REGISTRO DE CLIENTE
    =========================================== */

    static public function ctrCrearCliente()
    {

        if (isset($_POST["nuevoNombreC"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombreC"])) {

                $tabla = "cliente";

                $datos = array(
                    "nombre_cliente" => $_POST["nuevoNombreC"],
                    "telefono_cliente" => $_POST["nuevoTelefonoC"],
                    "correo_cliente" => $_POST["nuevoCorreoC"],
                    "contacto_em_cliente" => $_POST["nuevoContactoC"]
                );

                $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El cliente ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "clientes";
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
                                window.location = "clientes";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR CLIENTE
    =========================================== */

    static public function ctrMostrarClientes($item, $valor)
    {

        $tabla = "cliente";
        $respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR DE CLIENTE
    =========================================== */

    static public function ctrEditarCliente()
    {

        if (isset($_POST["editarNombreC"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["editarNombreC"])) {

                $tabla = "cliente";

                $datos = array(
                    "id_cliente" => $_POST["idCliente"],
                    "nombre_cliente" => $_POST["editarNombreC"],
                    "telefono_cliente" => $_POST["editarTelefonoC"],
                    "correo_cliente" => $_POST["editarCorreoC"],
                    "contacto_em_cliente" => $_POST["editarContactoC"]
                );


                $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                type: "success",
                                title: "¡El cliente ha sido editado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "clientes";
                                }
                            });    
                        </script>';
                }
            } else {


                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del cliente no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "clientes";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    BORRAR DE CLIENTE
    =========================================== */

    static public function ctrBorrarCliente()
    {

        if (isset($_GET["idCliente"])) {
            $tabla = "cliente";
            $datos = $_GET["idCliente"];

            $respuesta = ModeloClientes::mdlBorrarCliente($tabla, $datos);
         
            if ($respuesta == "ok") {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            type: "success",
                            title: "El cliente ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false,
                        }).then(function(result){
                            if(result.value){
                                window.location = "clientes"
                            }
                        })
                        </script>';
            }
        }
    }
}
