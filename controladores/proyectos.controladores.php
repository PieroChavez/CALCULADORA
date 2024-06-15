<?php

class ControladorProyecto
{


    /* ===========================================
    REGISTRO PROYECTO
    =========================================== */

    static public function ctrCrearProyecto()
    {

        if (isset($_POST["nuevoNombreProyecto"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ. ]+$/', $_POST["nuevoNombreProyecto"])) {

                $tabla = "proyecto";

                $datos = array(
                    "id_cliente" => $_POST["nuevoNombreCliente"],
                    "nombre_proyecto" => $_POST["nuevoNombreProyecto"],
                    "ubicacion_proyecto" => $_POST["nuevoUbicacionProyecto"],
                    "fecha_proyecto" => $_POST["nuevoFechaProyecto"],
                    "descri_proyecto" => $_POST["descripcionProyecto"]
                );

                $respuesta = ModeloProyecto::mdlIngresarProyecto($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "¡Datos guardados correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result) {
                                if (result.value) {
                                    // Obtener la palabra que quieres enviar al index
                                    var palabra = "nuevoProyecto";
                                    
                                    // Redirigir a "presupuestos" con la palabra como parámetro
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
                            title: "¡El nombre del proyecto no puede ir vacio o llevar caracteres especiales!",
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
    MOSTRAR PROYECTO
    =========================================== */

    static public function ctrMostrarProyectos($item, $valor)
    {

        $tablaC = "cliente";
        $tablaP = "proyecto";
        $respuesta = ModeloProyecto::mdlMostrarProyectos($tablaC, $tablaP, $item, $valor);

        return $respuesta;
    }

    /* ===========================================
    EDITAR PROYECTO
    =========================================== */

    static public function ctrEditarProyecto()
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
    BORRAR PROYECTO
    =========================================== */

    static public function ctrBorrarProyecto()
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
