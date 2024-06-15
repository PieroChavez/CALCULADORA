// Función para calcular la suma y mostrarla
function calcularSumaTerreno() {
    // Obtener los valores de precio unitario y cantidad
    var metrosCuadrados = parseFloat(document.getElementById("nuevoTerronoMC").value) || 0;
    var precio = parseFloat(document.getElementById("nuevoTerrenoPMC").value) || 0;
  
    // Calcular la suma
    var suma = metrosCuadrados * precio;


  
    // Mostrar la suma en el campo de resultado
    document.getElementById("resultadoTerreno").value = suma.toFixed(2);
  }

