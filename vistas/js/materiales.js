

/* =======================================
SELECIONANDO MATERIAL
======================================= */

$("#idMateriales").change(function(){

	var idMateriales = $("#idMateriales").val()
	
	var datos = new FormData();
	datos.append("idMateriales", idMateriales);

	$.ajax({

		url:"ajax/materiales.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#nuevoPrecioUnitarioM").val(respuesta["precio_venta_material"]);

		}

	});

})

/* =======================================
EDITAR MATERIAL
======================================= */

$(".tabla_material").on("click", ".btnEditarMaterial", function(){

	
	var idMaterial = $(this).attr("idMaterial");
	
	var datos = new FormData();
	datos.append("idMaterial", idMaterial);

	$.ajax({

		url:"ajax/materiales.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#idMaterial").val(respuesta["id_material"]);
			$("#editarProveedor").html(respuesta["nombre_proveedor"]);
			$("#editarProveedor").val(respuesta["id_proveedor"]);
			$("#editarNombreM").val(respuesta["nombre_material"]);
			$("#editarTipoM").val(respuesta["tipo_material"]);
			$("#editarMarcaM").val(respuesta["marca_material"]);
			$("#editarCantidadM").val(respuesta["cantidad_material"]);
			$("#editarCompraM").val(respuesta["precio_compra_material"]);
			$("#editarVentaM").val(respuesta["precio_venta_material"]);

		}

	});

})


/* =======================================
ELIMINAR MATERIAL
======================================= */

$(".tabla_material").on("click",".btnEliminarMaterial", function(){

    
    var idMaterial = $(this).attr("idMaterial");

    Swal.fire({
        title: '¿Está seguro de borrar el material?',
        text: '¡Si no lo está puede cancelar la acción!',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#232BEB',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar material'
    }).then(function(result){
        if(result.value){
            window.location = "index.php?ruta=materiales&idMaterial="+idMaterial;
        }
    })

})


