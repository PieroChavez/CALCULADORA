$(document).ready(function () {
  $("#consultar").click(function () {
    var dni = $("#dni").val();

    // Mostrar el loader
    $("#loader").show();

    $.ajax({
      type: "POST",
      url: "ajax/consulta-dni-ajax.php",
      data: "dni=" + dni,
      dataType: "json",
      success: function (data) {
        // Ocultar el loader
        $("#loader").hide();

        if (data == 1) {
          alert("El DNI tiene que tener 8 dígitos");
        } else {
          $("#nuevoNombreC").val(data.nombres + " " + data.apellidoPaterno + " " + data.apellidoMaterno);
        }
      },
    });
  });
});
