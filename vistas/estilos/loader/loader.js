document.addEventListener("DOMContentLoaded", function () {
    // Muestra el loader
    document.getElementById("loader-container").style.display = "flex";

    // Simula la carga del contenido (puedes reemplazar esto con tu lógica de carga)
    setTimeout(function () {
        // Oculta el loader después de 3 segundos
        document.getElementById("loader-container").style.display = "none";
        // Muestra el contenido principal
        document.getElementById("main-content").style.display = "block";
    }, 2000);
});
