
/* =======================================
EDITAR CONTACTO CLIENTE
======================================= */

$(".tablas_proveedor").on("click", ".btnEditarProveedor", function(){


	var idProveedor = $(this).attr("idProveedor");
	
	var datos = new FormData();
	datos.append("idProveedor", idProveedor);

	$.ajax({

		url:"ajax/proveedores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idProveedor").val(respuesta["id_proveedor"]);
			$("#editarNombre").val(respuesta["nombre_proveedor"]);
			$("#editarTelefono").val(respuesta["telefono_proveedor"]);
			$("#editarCorreo").val(respuesta["correo_proveedor"]);
			$("#editarDireccion").val(respuesta["direccion_proveedor"]);

		}

	});

})


/* =======================================
ELIMINAR CONTACTO CLIENTE
======================================= */

$(".tablas_proveedor").on("click",".btnEliminarProveedor", function(){
    
    var idProveedor = $(this).attr("idProveedor");

    Swal.fire({
        title: '¿Está seguro de borrar el proveedor?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar usuario'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;
        }
    })

})