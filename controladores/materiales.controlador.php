<?php

class ControladorMateriales{


    /* ===========================================
    REGISTRO MATERIALES
    =========================================== */

    static public function ctrCrearMateriales()
    {

        if (isset($_POST["nuevoNombreM"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. \/]+$/', $_POST["nuevoNombreM"])) {

                $tabla = "material";

                $datos = array(
                    "id_proveedor" => $_POST["nuevoNombreProveedor"],
                    "nombre_material" => $_POST["nuevoNombreM"],
                    "tipo_material" => $_POST["nuevoTipoM"],
                    "marca_material" => $_POST["nuevoMarcaM"],
                    "cantidad_material" => $_POST["nuevoCantidadM"],
                    "precio_compra_material" => $_POST["nuevoPrecioCompraM"],
                    "precio_venta_material" => $_POST["nuevoPrecioVentaM"]);

                $respuesta = ModeloMateriales::mdlIngresarMaterial($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡El material ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                }).then(function(result){
                                    if(result.value){
                                        window.location = "materiales";
                                    }
                                });    
                            </script>';
                }
            } else {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del material no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "materiales";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    MOSTRAR MATERIALES
    =========================================== */

    static public function ctrMostrarMateriales($item, $valor)
    {

        $tablaP = "proveedor";
        $tablaM = "material";
        $respuesta = ModeloMateriales::mdlMostrarMateriales($tablaP, $tablaM, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR MATERIALES
    =========================================== */

    static public function ctrEditarMateriales()
    {

        if (isset($_POST["editarNombreM"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreM"])) {

                $tabla = "material";

                $datos = array(
                    "id_material" => $_POST["idMaterial"],
                    "id_proveedor" => $_POST["editarProveedor"],
                    "nombre_material" => $_POST["editarNombreM"],
                    "tipo_material" => $_POST["editarTipoM"],
                    "marca_material" => $_POST["editarMarcaM"],
                    "cantidad_material" => $_POST["editarCantidadM"],
                    "precio_compra_material" => $_POST["editarCompraM"],
                    "precio_venta_material" => $_POST["editarVentaM"]
                );


                $respuesta = ModeloMateriales::mdlEditarmaterial($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                type: "success",
                                title: "¡El material ha sido editado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location = "materiales";
                                }
                            });    
                        </script>';
                }
            } else {


                echo '<script>
                        Swal.fire({
                            icon: "error",
                            type: "error",
                            title: "¡El nombre del material no puede ir vacio o llevar caracteres especiales!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "material";
                            }
                        });    
                    </script>';
            }
        }
    }

    /* ===========================================
    BORRAR MATERIALES
    =========================================== */

    static public function ctrBorrarMateriales()
    {

        if (isset($_GET["idMaterial"])) {
            $tabla = "material";
            $datos = $_GET["idMaterial"];

            $respuesta = ModeloMateriales::mdlBorrarMaterial($tabla, $datos);
         
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
                                window.location = "materiales"
                            }
                        })
                        </script>';
            }
        }
    }
}
