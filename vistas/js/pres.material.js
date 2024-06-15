// Función para calcular la suma y mostrarla
function calcularSuma() {
  // Obtener los valores de precio unitario y cantidad
  var precioUnitario = parseFloat(document.getElementById("nuevoPrecioUnitarioM").value) || 0;
  var cantidad = parseInt(document.getElementById("nuevoCantidadM").value) || 0;

  // Calcular la suma
  var suma = precioUnitario * cantidad;

  // Mostrar la suma en el campo de resultado
  document.getElementById("resultadoSuma").value = suma.toFixed(2);
}

/* =======================================
ELIMINAR PRESUPUESTO MATERIAL
======================================= */

$(".tabla_pres_material").on("click", ".btnEliminarPresMaterial", function () {
  var idPresMaterial = $(this).attr("idPresMaterial");

  Swal.fire({
    title: "¿Está seguro de borrar el material?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#232BEB",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar material"
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=presupuestos&idPresMaterial=" + idPresMaterial;
    }
  });
});


