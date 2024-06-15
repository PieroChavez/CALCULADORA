// Función para calcular la suma y mostrarla
function sumaProcentajeGanacia() {
  // Obtener los valores de precio unitario y cantidad
  var sumaParcial =
    parseFloat(document.getElementById("nuevoSumaPar").value) || 0;
  var sumaParcial =
    parseFloat(
      document.getElementById("nuevoSumaPar").value.replace("S/ ", "")
    ) || 0;
  var porcentajeGanancia =
    parseInt(document.getElementById("nuevoPorc").value) || 0;

  // Calcular la suma
  var ganancia = (sumaParcial * porcentajeGanancia) / 100;
  var resultadoSumaT = sumaParcial + ganancia;

  // Mostrar la suma en el campo de resultado
  /* document.getElementById("presupuestoFinal").value = resultadoSumaT.toFixed(2); */
  document.getElementById("presupuestoFinal").value = "S/ " + resultadoSumaT.toFixed(2);
}

// Mostrar el resultado en el campo correspondiente con un estilo modificado
document.getElementById("nuevoSumaPar").style.fontSize = "16px"; // Ajusta el tamaño del texto
document.getElementById("nuevoSumaPar").style.fontWeight = "bold"; // Aplica negrita al texto


// Mostrar el resultado en el campo correspondiente con un estilo modificado
document.getElementById("presupuestoFinal").style.fontSize = "16px"; // Ajusta el tamaño del texto
document.getElementById("presupuestoFinal").style.fontWeight = "bold"; // Aplica negrita al texto
