document.addEventListener("DOMContentLoaded", function () {
  // Referencia al formulario
  var formulario = document.getElementById("form_registrase");

  // Manejador del evento submit del formulario
  formulario.addEventListener("submit", function (event) {
    // Validar los campos del formulario
    if (!validarFormulario()) {
      // Evitar que se envíe el formulario si la validación no pasa
      event.preventDefault();
    }
  });

  // Función para validar los campos del formulario
  function validarFormulario() {
    var nombre = document.getElementById("nuevoNombre").value;
    var usuario = document.getElementById("nuevoUsuario").value;
    var password = document.getElementById("nuevoPassword").value;
    var perfil = document.getElementById("nuevoPerfil").value;

    // Limpiar mensajes de error existentes
    limpiarMensajesError();

    // Validar que los campos no estén vacíos
    if (nombre.trim() === "") {
      mostrarError("Por favor, ingresa un nombre.", "nuevoNombre");
      return false;
    }

    if (usuario.trim() === "") {
      mostrarError("Por favor, ingresa un usuario o correo.", "nuevoUsuario");
      return false;
    }

    if (password.trim() === "") {
      mostrarError("Por favor, ingresa una contraseña.", "nuevoPassword");
      return false;
    }

    if (perfil === "") {
      mostrarError("Por favor, selecciona un perfil.", "nuevoPerfil");
      return false;
    }

    // Puedes agregar más validaciones según tus necesidades

    return true; // Si todas las validaciones pasan, devuelve true
  }

  // Función para mostrar un mensaje de error debajo de un campo específico
  function mostrarError(mensaje, campo) {
    var input = document.getElementById(campo);
    var mensajeError = document.createElement("div");
    mensajeError.className = "alert alert-danger mt-2";
    mensajeError.textContent = mensaje;
    input.parentNode.appendChild(mensajeError);
  }

  // Función para limpiar todos los mensajes de error
  function limpiarMensajesError() {
    var mensajesError = document.querySelectorAll(".alert");
    mensajesError.forEach(function (mensaje) {
      mensaje.parentNode.removeChild(mensaje);
    });
  }
});

/* ===============================================================
VALIDANDO LOS DATOS DEL INICIO DE SESSION
=============================================================== */

document.addEventListener("DOMContentLoaded", function () {
  // Referencia al formulario de inicio de sesión
  var formularioInicioSesion = document.getElementById("form_inicio_session");

  // Manejador del evento submit del formulario de inicio de sesión
  formularioInicioSesion.addEventListener("submit", function (event) {
    // Validar los campos del formulario de inicio de sesión
    if (!validarFormularioInicioSesion()) {
      // Evitar que se envíe el formulario si la validación no pasa
      event.preventDefault();
    }
  });

  // Función para validar los campos del formulario de inicio de sesión
  function validarFormularioInicioSesion() {
    var usuario = document.getElementById("ingUsuario").value;
    var password = document.getElementById("ingPassword").value;

    // Limpiar mensajes de error existentes
    limpiarMensajesErrorInicioSesion();

    // Validar que los campos no estén vacíos
    if (usuario.trim() === "") {
      mostrarErrorInicioSesion("Por favor, ingresa un usuario.", "ingUsuario");
      return false;
    }

    if (password.trim() === "") {
      mostrarErrorInicioSesion(
        "Por favor, ingresa una contraseña.",
        "ingPassword"
      );
      return false;
    }

    // Puedes agregar más validaciones según tus necesidades

    return true; // Si todas las validaciones pasan, devuelve true
  }

  // Función para mostrar un mensaje de error debajo de un campo específico en el formulario de inicio de sesión
  function mostrarErrorInicioSesion(mensaje, campo) {
    var input = document.getElementById(campo);
    var mensajeError = document.createElement("div");
    mensajeError.className = "alert alert-danger mt-2";
    mensajeError.textContent = mensaje;
    input.parentNode.appendChild(mensajeError);
  }

  // Función para limpiar todos los mensajes de error en el formulario de inicio de sesión
  function limpiarMensajesErrorInicioSesion() {
    var mensajesError = document.querySelectorAll(".alert");
    mensajesError.forEach(function (mensaje) {
      mensaje.parentNode.removeChild(mensaje);
    });
  }
});
