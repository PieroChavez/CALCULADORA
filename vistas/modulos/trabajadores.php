<?php
if ($_SESSION["perfil"] != "Especial" && $_SESSION["perfil"] != "Administrador") {
  echo '<script>
        window.location = "inicio"
    </script>';
}
?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="mb-3">
            <h4><b>Administrar trabajadores</b></h4>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlNuevoTrabajador" data-whatever="@getbootstrap">Nuevo trabajador</button>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table tabla_trabajador">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Especialidad</th>
                      <th>DNI</th>
                      <th>Teléfono</th>
                      <th>Función</th>
                      <th>Tiempo de trabajo</th>
                      <th>Sueldo mensual</th>
                      <th>Sueldo semanal</th>
                      <th>Sueldo diario</th>
                      <th>Sueldo por proyecto</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $trabajador = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

                    foreach ($trabajador as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre_trabajador"] . '</td>
                              <td>' . $value["especialidad_trabajador"] . '</td>
                              <td>' . $value["dni_trabajador"] . '</td>
                              <td>' . $value["telefono_trabajador"] . '</td>
                              <td>' . $value["funcion_trabajador"] . '</td>
                              <td>' . $value["tiempo_trab_trabajador"] . '</td>
                              <td>' . $value["sueldo_men_trabajador"] . '</td>
                              <td>' . $value["sueldo_sem_trabajador"] . '</td>
                              <td>' . $value["sueldo_dia_trabajador"] . '</td>
                              <td>' . $value["sueldo_proyecto"] . '</td>
                              <td>' . $value["fecha_trabajador"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-warning btnEditarTrabajador" idTrabajador="' . $value["id_trabajador"] . '" data-toggle="modal" data-target="#mdlEditarTrabajador" data-whatever="@getbootstrap"><i class="mdi mdi-pencil"></i></button>
                                  <button class="btn btn-danger btnEliminarTrabajador" idTrabajador="' . $value["id_trabajador"] . '"><i class="mdi mdi-delete"></i></button>
                                </div>
                              </td>
                              </tr>';
                    }
                    ?>


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include "vistas/modulos/footer.php";
    ?>

  </div>
</div>


<!-- ===========================================
    MODAL NUEVO TRABAJADOR
    =========================================== -->

<div class="modal fade" id="mdlNuevoTrabajador" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Nuevo trabajador</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de nombre-->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingrese el nombre" required>
          </div>

          <!-- Entrada de especialidad -->
          <div class="form-group">
            <label for="message-text">Especialidad:</label>
            <input type="text" class="form-control" name="nuevoEspacialidad" placeholder="Ingrese el especialidad" required>
          </div>

          <!-- Entrada de DNI -->
          <div class="form-group">
            <label for="message-text">DNI:</label>
            <input type="text" class="form-control" name="nuevoDni" min="8" max="8" placeholder="Ingrese el dni" required>
          </div>

          <!-- Entrada de telefono -->
          <div class="form-group">
            <label for="message-text">Teléfono:</label>
            <input type="text" class="form-control" name="nuevoTelefono" placeholder="Ingrese la teléfono" required>
          </div>


          <!-- Entrada del funcion del trabajador -->
          <div class="form-group">
            <label for="message-text">Funcion o rol:</label>
            <input type="text" class="form-control" name="nuevoFuncion" placeholder="Ingrese la función" required>
          </div>

          <!-- Entrada de tiempo de trabajo -->
          <div class="form-group">
            <label for="message-text">Tiempo de trabajo (semana | meses | años):</label>
            <input type="number" class="form-control" name="nuevoTiempoTrabajo" placeholder="Ingrese el tiempo de trabajo" required>
          </div>

          <!-- Entrada de sueldo mensual -->
          <div class="form-group">
            <label for="message-text">Sueldo mensual:</label>
            <input type="number" class="form-control" name="nuevoSueldoM" placeholder="Ingrese el sueldo mensual" required>
          </div>

          <!-- Entrada de sueldo semanal -->
          <div class="form-group">
            <label for="message-text">Sueldo semanal:</label>
            <input type="number" class="form-control" name="nuevoSueldoS" placeholder="Ingrese el sueldo semanal" required>
          </div>

          <!-- Entrada de sueldo diario -->
          <div class="form-group">
            <label for="message-text">Sueldo diario:</label>
            <input type="number" class="form-control" name="nuevoSueldoD" placeholder="Ingrese el sueldo diario" required>
          </div>

          <!-- Entrada de sueldo proyecto -->
          <div class="form-group">
            <label for="message-text">Sueldo por proyecto:</label>
            <input type="number" class="form-control" name="nuevoSueldoP" placeholder="Ingrese el sualdo por proyecto" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Guardar</button>
          </div>

          <!-- Guardamos los datos del usuario -->
          <?php

          $crearTrabajador = new ControladorTrabajadores();
          $crearTrabajador->ctrCrearTrabajador();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ===========================================
    MODAL EDITAR TRABAJADOR
    =========================================== -->

<div class="modal fade" id="mdlEditarTrabajador" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Editar trabajador</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de ID escondido -->
          <div class="form-group">
            <input type="hidden" class="form-control" name="idTrabajador" id="idTrabajador" value="" required>
          </div>
          
          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" name="editarNombreT" id="editarNombreT" value="" required>
          </div>

          <!-- Entrada de especialidad -->
          <div class="form-group">
            <label for="message-text">Especialidad:</label>
            <input type="text" class="form-control" name="editarEspecialidadT" id="editarEspecialidadT" value="" required>
          </div>

          <!-- Entrada de DNI -->
          <div class="form-group">
            <label for="message-text">DNI:</label>
            <input type="text" class="form-control" name="editarDniT" id="editarDniT" value="" required>
          </div>

          <!-- Entrada de Teléfono -->
          <div class="form-group">
            <label for="message-text">Teléfono:</label>
            <input type="text" class="form-control" name="editarTelefonoT" id="editarTelefonoT" value="" required>
          </div>

          <!-- Entrada de Funcion -->
          <div class="form-group">
            <label for="message-text">Funcion:</label>
            <input type="text" class="form-control" name="editarFuncionT" id="editarFuncionT" value="" required>
          </div>

          <!-- Entrada de Tiempo de trabajo -->
          <div class="form-group">
            <label for="message-text">Tiempo de trabajo:</label>
            <input type="number" class="form-control" name="editarTiempoT" id="editarTiempoT" value="" required>
          </div>

          <!-- Entrada de sueldo mensual -->
          <div class="form-group">
            <label for="message-text">Sueldo mensual:</label>
            <input type="number" class="form-control" name="editarSueldoM" id="editarSueldoM" value="" required>
          </div>

          <!-- Entrada de sueldo semanal -->
          <div class="form-group">
            <label for="message-text">Sueldo semanal:</label>
            <input type="number" class="form-control" name="editarSueldoS" id="editarSueldoS" value="" required>
          </div>

          <!-- Entrada de sueldo diario -->
          <div class="form-group">
            <label for="message-text">Sueldo diario:</label>
            <input type="number" class="form-control" name="editarSueldoD" id="editarSueldoD" value="" required>
          </div>

          <!-- Entrada de sueldo pro proyecto -->
          <div class="form-group">
            <label for="message-text">Sueldo por proyecto:</label>
            <input type="number" class="form-control" name="editarSueldoP" id="editarSueldoP" value="" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Modificar usuario</button>
          </div>

          <!-- Editar los datos del trabajador -->
          <?php

          $editarTrabajador = new ControladorTrabajadores();
          $editarTrabajador->ctrEditarTrabajador();
        
          ?>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- ===========================================
    ELIMINAR TRABAJADOR
    =========================================== -->

<?php
    
$borrarTrabajador = new ControladorTrabajadores();
$borrarTrabajador->ctrBorrarTrabajador();

?>