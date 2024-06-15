

/* =======================================
VCER  PRESUPUESTO
======================================= */

$(".ver_presupuesto").on("click", ".btnVerPresupuesto", function(){

	var idProyecto = $(this).attr("idProyecto");
	
	var datos = new FormData();
	datos.append("idProyecto", idProyecto);

	$.ajax({

		url:"ajax/verPresupuesto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idVerProyecto").val(respuesta["id_proyecto"]);
			$("#nombreCliente").html(respuesta["nombre_cliente"]);
			$("#telefonoCliente").html(respuesta["telefono_cliente"]);
			$("#correoCliente").html(respuesta["correo_cliente"]);

			$("#nombreProyecto").html(respuesta["nombre_proyecto"]);
			$("#ubicacionProyecto").html(respuesta["ubicacion_proyecto"]);

			$("#presupuestoMateriales").html('S/ '+respuesta["suma_costo_total_materiales"]);
			$("#presupuestoTrabajadores").html('S/ '+respuesta["suma_costo_total_trabajadores"]);
			$("#presupuestoTerreno").html('S/ '+respuesta["suma_total_terreno"]);
			$("#presupuestoPorcentaje").html(respuesta["porcentaje_ganancia"]+' %');
			$("#presupuestoCostoParcial").html('<b>'+respuesta["costo_parcial"]+'</b>');
			$("#presupuestoFinal").html('<b>'+respuesta["costo_final"]+'</b>');

		}

	});

})



/* =======================================
ELIMINAR PRESUPUESTO
======================================= */

$(".ver_presupuesto").on("click",".btnEliminarPresupuesto", function(){
    
    var idPresupuesto = $(this).attr("idPresupuesto");

    Swal.fire({
        title: '¿Está seguro de borrar el prespuesto?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar presupuesto'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=verPresupuestos&idPresupuesto="+idPresupuesto;
        }
    })

})