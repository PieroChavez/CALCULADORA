/* =======================================
SELECIONANDO MATERIAL
======================================= */

$("#idTrabajadores").change(function () {
  var idTrabajadores = $("#idTrabajadores").val();

  var datos = new FormData();
  datos.append("idTrabajadores", idTrabajadores);

  $.ajax({
    url: "ajax/trabajadores.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#sueldoPorTiempo").change(function () {
        var sueldoPorTiempo = $("#sueldoPorTiempo").val();

        if (sueldoPorTiempo == "dia") {
          $("#nuevoSueldoT").val(respuesta["sueldo_dia_trabajador"]);
        } else if (sueldoPorTiempo == "semana") {
          $("#nuevoSueldoT").val(respuesta["sueldo_sem_trabajador"]);
        } else if (sueldoPorTiempo == "proyecto") {
          $("#nuevoSueldoT").val(respuesta["sueldo_proyecto"]);
        } else {
          $("#nuevoSueldoT").val(respuesta["sueldo_men_trabajador"]);
        }
      });
    }
  });
});

// Función para calcular la suma y mostrarla
function calcularSumaT() {
  // Obtener los valores de precio unitario y cantidad
  var sueldoAcordado =
    parseFloat(document.getElementById("nuevoSueldoT").value) || 0;
  var cantidadT =
    parseInt(document.getElementById("nuevoCantidadTT").value) || 0;

  // Calcular la suma
  var suma = sueldoAcordado * cantidadT;

  // Mostrar la suma en el campo de resultado
  document.getElementById("resultadoSumaT").value = suma.toFixed(2);
}

/* =======================================
  ELIMINAR PRESUPUESTO MATERIAL
  ======================================= */

$(".tabla_pres_trabajador").on(
  "click",
  ".btnEliminarPresTrabajador",
  function () {
    var idPresTrabajador = $(this).attr("idPresTrabajador");

    Swal.fire({
      title: "¿Está seguro de borrar el trabajador?",
      text: "¡Si no lo está puede cancelar la acción!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#232BEB",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "Si, borrar trabajador"
    }).then(function (result) {
      if (result.value) {
        window.location =
          "index.php?ruta=presupuestos&idPresTrabajador=" + idPresTrabajador;
      }
    });
  }
);
