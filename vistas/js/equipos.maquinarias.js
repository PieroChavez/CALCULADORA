
/* =======================================
EDITAR EQUIPOS Y MAQUINARIAS
======================================= */

$(".tabla_EM").on("click", ".btnEditarEM", function(){

	var idEM = $(this).attr("idEM");
	
	var datos = new FormData();
	datos.append("idEM", idEM);

	$.ajax({

		url:"ajax/equipos.maquinas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idEM").val(respuesta["id_em"]);
			$("#editarNombreEM").val(respuesta["nombre_em"]);
			$("#editarTipoEM").val(respuesta["tipo_em"]);
			$("#editarCantidadEM").val(respuesta["cantidad_em"]);
			$("#editarModeloEM").val(respuesta["modelo_em"]);
			$("#editarUltimoUsoEM").val(respuesta["ultimo_uso_em"]);
			$("#editarTrabajadorEM").html(respuesta["nombre_trabajador"]);
			$("#editarTrabajadorEM").val(respuesta["id_trabajador"]);

		}

	});

})


/* =======================================
ELIMINAR EQUIPOS Y MAQUINARIAS
======================================= */

$(".tabla_EM").on("click",".btnEliminarEM", function(){

    var idEM = $(this).attr("idEM");

    Swal.fire({
        title: '¿Está seguro de borrar el equipo o maquinaria?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar equipo o maquinaria'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=equiposMaquinarias&idEM="+idEM;
        }
    })

})