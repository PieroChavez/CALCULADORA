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
            <h4><b>Administrar equipos y maquinarias</b></h4>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlNuevoEquipoMaquina" data-whatever="@getbootstrap">Nuevo equipo y máquina</button>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table tabla_EM">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Cantidad</th>
                      <th>Modelo</th>
                      <th>Útimo uso</th>
                      <th>Encargado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $equiposMaquinarias = ControladorEquiposMaquinarias::ctrMostrarEquiposMaquinarias($item, $valor);

                    foreach ($equiposMaquinarias as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre_em"] . '</td>
                              <td>' . $value["tipo_em"] . '</td>
                              <td>' . $value["cantidad_em"] . '</td>
                              <td>' . $value["modelo_em"] . '</td>
                              <td>' . $value["ultimo_uso_em"] . '</td>
                              <td>' . $value["nombre_trabajador"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-warning btnEditarEM" idEM="' . $value["id_em"] . '" data-toggle="modal" data-target="#mdlEditarEM" data-whatever="@getbootstrap"><i class="mdi mdi-pencil"></i></button>
                                  <button class="btn btn-danger btnEliminarEM" idEM="' . $value["id_em"] . '"><i class="mdi mdi-delete"></i></button>
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
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <?php
    include "vistas/modulos/footer.php";
    ?>
    <!-- partial -->
  </div>
  <!-- main-panel ends -->
</div>


<!-- ===========================================
    MODAL NUEVO  EQUIPO Y MAQUINA
    =========================================== -->

<div class="modal fade" id="mdlNuevoEquipoMaquina" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Nuevo Equipo o maquinaria</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de nombre del equipo o maquinarias-->
          <div class="form-group">
            <label for="recipient-name">Nombre de equipo o máquina:</label>
            <input type="text" class="form-control" name="nuevoNombreEM" placeholder="Ingrese el nombre" required>
          </div>

          <!-- Entrada de tipo de máquina -->
          <div class="form-group">
            <label for="message-text">Tipo de equipo o máquina:</label>
            <input type="text" class="form-control" name="nuevoTipoEM" placeholder="Ingrese el tipo" required>
          </div>

          <!-- Entrada de cantidad  de equipo o maquinaria -->
          <div class="form-group">
            <label for="message-text">Cantidad de equipo o máquina:</label>
            <input type="number" class="form-control" name="nuevoCantidadEM" placeholder="Ingresa la cantidad" required>
          </div>

          <!-- Entrada de modelo de equipo o maquinaria -->
          <div class="form-group">
            <label for="message-text">Modelo de equipo o máquina:</label>
            <input type="text" class="form-control" name="nuevoModeloEM" placeholder="Ingrese el modelo" required>
          </div>

          <!-- Entrada de ultimo uso -->
          <div class="form-group">
            <label for="message-text">Útimo uso de equipo o máquina:</label>
            <input type="date" class="form-control" name="nuevoUltimoUsoEM" placeholder="Ingrese el modelo" required>
          </div>

          <!-- Entrada de nombre del encargado -->
          <div class="form-group">
            <label for="recipient-name">Encargado:</label>
            <select name="nuevoEncargadoEM" id="nuevoEncargadoEM" class="form-control">
              <option value="">Seleccione el encargado</option>
              <?php
              $item = null;
              $valor = null;

              $trabajador = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
              foreach ($trabajador as $key => $value) {
                echo '<option value="' . $value["id_trabajador"] . '">' . $value["nombre_trabajador"] . ' | ' . $value["especialidad_trabajador"] . '</option>';
              }
              ?>
            </select>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Guardar</button>
          </div>

          <!-- Guardamos los datos de equipo y materiales -->
          <?php

          $crearEquiposMaquinarias = new ControladorEquiposMaquinarias();
          $crearEquiposMaquinarias->ctrCrearEquipoMaquinaria();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ===========================================
    MODAL EDITAR  EQUIPO Y MAQUINA
    =========================================== -->

<div class="modal fade" id="mdlEditarEM" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Editar equipo o maquinaria</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de ID escondido -->
          <div class="form-group">
            <input type="hidden" class="form-control" name="idEM" id="idEM" value="" required>
          </div>

          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre equipo o maquinaria:</label>
            <input type="text" class="form-control" name="editarNombreEM" id="editarNombreEM" value="" required>
          </div>

          <!-- Entrada de tipo -->
          <div class="form-group">
            <label for="message-text">Tipo equipo o maquinaria:</label>
            <input type="text" class="form-control" name="editarTipoEM" id="editarTipoEM" value="" required>
          </div>

          <!-- Entrada de cantidad -->
          <div class="form-group">
            <label for="message-text">Cantidad equipo o maquinaria:</label>
            <input type="number" class="form-control" name="editarCantidadEM" id="editarCantidadEM" value="" required>
          </div>

          <!-- Entrada de modelo-->
          <div class="form-group">
            <label for="message-text">Modelo equipo o maquinaria:</label>
            <input type="text" class="form-control" name="editarModeloEM" id="editarModeloEM" value="" required>
          </div>

          <!-- Entrada de ulitmo uso-->
          <div class="form-group">
            <label for="message-text">Modelo equipo o maquinaria:</label>
            <input type="text" class="form-control" name="editarUltimoUsoEM" id="editarUltimoUsoEM" value="" required>
          </div>

          <!-- Entrada del encargado -->
          <div class="form-group">
            <label for="recipient-name">Nombre encargado:</label>
            <select name="editarTrabajadorEM" class="form-control">
              <option id="editarTrabajadorEM"></option>
              <?php
              $item = null;
              $valor = null;

              $trabajador = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
              foreach ($trabajador as $key => $value) {
                echo '<option value="' . $value["id_trabajador"] . '">' . $value["nombre_trabajador"] . ' | '.$value["especialidad_trabajador"].'</option>';
              }
              ?>
            </select>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Modificar usuario</button>
          </div>

          <!-- Guardamos los datos del equipo o maquina -->
          <?php

          $editarEquipoMaquina = new ControladorEquiposMaquinarias();
          $editarEquipoMaquina->ctrEditarEquipoMaterial();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- ===========================================
    ELIMINAR EQUIPO Y MAQUINA
    =========================================== -->

<?php

$borrarEM = new ControladorEquiposMaquinarias();
$borrarEM->ctrBorrarEquipoMaquina();
?>