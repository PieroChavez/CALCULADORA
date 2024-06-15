<?php
if ($_SESSION["perfil"] == "Especial") {
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
            <h4><b>Administrar Usuarios</b></h4>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlUsuarios" data-whatever="@getbootstrap">Nuevo usuario</button>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table tablas">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Perfil</th>
                      <th>Estado</th>
                      <th>Último Login</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $usaurios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                    foreach ($usaurios as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre"] . '</td>
                              <td>' . $value["usuario"] . '</td>
                              <td>' . $value["perfil"] . '</td>
                              ';
                      if ($value["estado"] != 0) {
                        echo '<td><button class="btn btn-success btn-sm btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                      } else {
                        echo '<td><button class="btn btn-danger btn-sm btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                      }
                      echo '<td>' . $value["ultimo_login"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#mdlEditarUsuario" data-whatever="@getbootstrap"><i class="mdi mdi-pencil"></i></button>
                                  <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" usuario="' . $value["usuario"] . '"><i class="mdi mdi-delete"></i></button>
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
    MODAL NUEVO USAURIO
    =========================================== -->

<div class="modal fade" id="mdlUsuarios" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Nuevo usuario</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" name="nuevoNombre" placeholder="Nombre">
          </div>

          <!-- Entrada de usuario -->
          <div class="form-group">
            <label for="message-text">Usuario:</label>
            <input type="text" class="form-control" name="nuevoUsuario" id="nuevoUsuario" placeholder="Usuario">
          </div>

          <!-- Entrada de contraseña -->
          <div class="form-group">
            <label for="message-text">Contraseña:</label>
            <input type="password" class="form-control" name="nuevoPassword" placeholder="Usuario">
          </div>

          <!-- Entrada de perfil -->
          <div class="form-group">
            <label for="message-text">Perfil:</label>
            <select class="form-control" name="nuevoPerfil" id="">
              <option value="">Selecionar perfil</option>
              <option value="Administrador">Administrador</option>
              <option value="Especial">Especial</option>
            </select>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Guardar</button>
          </div>

          <!-- Guardamos los datos del usuario -->
          <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario->ctrCrearUsuario();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ===========================================
    MODAL EDITAR USAURIO
    =========================================== -->

<div class="modal fade" id="mdlEditarUsuario" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Editar usuario</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" name="editarNombre" id="editarNombre" value="" required>
          </div>

          <!-- Entrada de usuario -->
          <div class="form-group">
            <label for="message-text">Usuario:</label>
            <input type="text" class="form-control" name="editarUsuario" id="editarUsuario" value="" readonly>
          </div>

          <!-- Entrada de contraseña -->
          <div class="form-group">
            <label for="message-text">Contraseña:</label>
            <input type="password" class="form-control" name="editarPassword" placeholder="Escriba la nueva contraseña">
            <input type="hidden" id="passwordActual" name="passwordActual">
          </div>

          <!-- Entrada de perfil -->
          <div class="form-group">
            <label for="message-text">Perfil:</label>
            <select class="form-control" name="editarPerfil">
              <option value="" id="editarPerfil"></option>
              <option value="Administrador">Administrador</option>
              <option value="Especial">Especial</option>
            </select>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Modificar usuario</button>
          </div>

          <!-- Guardamos los datos del usuario -->
          <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario->ctrEditarUsuario();

        
          ?>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- ===========================================
    ELIMINAR USUARIO
    =========================================== -->

    <?php
    
    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario->ctrBorrarUsuario();
    
    ?>