

/* =======================================
EDITAR CLIENTE
======================================= */

$(".tabla_cliente").on("click", ".btnEditarCliente", function(){


	var idCliente = $(this).attr("idCliente");
	
	var datos = new FormData();
	datos.append("idCliente", idCliente);

	$.ajax({

		url:"ajax/clientes.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idCliente").val(respuesta["id_cliente"]);
			$("#editarNombreC").val(respuesta["nombre_cliente"]);
			$("#editarTelefonoC").val(respuesta["telefono_cliente"]);
			$("#editarCorreoC").val(respuesta["correo_cliente"]);
			$("#editarContactoC").val(respuesta["contacto_em_cliente"]);

		}

	});

})


/* =======================================
ELIMINAR CLIENTE
======================================= */

$(".tabla_cliente").on("click",".btnEliminarCliente", function(){
    
    var idCliente = $(this).attr("idCliente");

    Swal.fire({
        title: '¿Está seguro de borrar el cliente?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }
    })

})