
/* =======================================
EDITAR TRABAJADOR
======================================= */

$(".tabla_trabajador").on("click", ".btnEditarTrabajador", function(){

	var idTrabajador = $(this).attr("idTrabajador");
	
	var datos = new FormData();
	datos.append("idTrabajador", idTrabajador);

	$.ajax({

		url:"ajax/trabajadores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idTrabajador").val(respuesta["id_trabajador"]);
			$("#editarNombreT").val(respuesta["nombre_trabajador"]);
			$("#editarEspecialidadT").val(respuesta["especialidad_trabajador"]);
			$("#editarDniT").val(respuesta["dni_trabajador"]);
			$("#editarTelefonoT").val(respuesta["telefono_trabajador"]);
			$("#editarFuncionT").val(respuesta["funcion_trabajador"]);
			$("#editarTiempoT").val(respuesta["tiempo_trab_trabajador"]);
			$("#editarSueldoM").val(respuesta["sueldo_men_trabajador"]);
			$("#editarSueldoS").val(respuesta["sueldo_sem_trabajador"]);
			$("#editarSueldoD").val(respuesta["sueldo_dia_trabajador"]);
			$("#editarSueldoP").val(respuesta["sueldo_proyecto"]);

		}

	});

})


/* =======================================
ELIMINAR TRABAJADOR
======================================= */

$(".tabla_trabajador").on("click",".btnEliminarTrabajador", function(){
    
    var idTrabajador = $(this).attr("idTrabajador");

    Swal.fire({
        title: '¿Está seguro de borrar el trabajador?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar trabajador'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=trabajadores&idTrabajador="+idTrabajador;
        }
    })

})