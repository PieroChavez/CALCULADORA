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
            <h4><b>Administrar clientes</b></h4>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlNuevoCliente" data-whatever="@getbootstrap">Nuevo cliente</button>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table tabla_cliente">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Correo</th>
                      <th>contacto emergencia</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);

                    foreach ($clientes as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre_cliente"] . '</td>
                              <td>' . $value["telefono_cliente"] . '</td>
                              <td>' . $value["correo_cliente"] . '</td>
                              <td>' . $value["contacto_em_cliente"] . '</td>
                              <td>' . $value["fecha_cliente"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-warning btnEditarCliente" idCliente="' . $value["id_cliente"] . '" data-toggle="modal" data-target="#mdlEditarCliente" data-whatever="@getbootstrap"><i class="mdi mdi-pencil"></i></button>
                                  <button class="btn btn-danger btnEliminarCliente" idCliente="' . $value["id_cliente"] . '"><i class="mdi mdi-delete"></i></button>
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
    <!-- Footer -->
    <?php
    include "vistas/modulos/footer.php";
    ?>

  </div>
</div>


<!-- ===========================================
    MODAL NUEVO CLIENTE
    =========================================== -->

<div class="modal fade" id="mdlNuevoCliente" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Nuevo cliente</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de DNI -->
          <div class="row">
            <div class="col-md-6">
              <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese el DNI del cliente" required>

            </div>
            <div class="col-md-4">
              <a href="#" id="consultar" class="btn btn-primary text-center " style="height: 40px;">Consultar Cliente</a>
            </div>
          </div>
          <br>
          <div class="text-center">
            <div id="loader" class="spinner-border text-primary" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" id="nuevoNombreC" value="" name="nuevoNombreC" placeholder="Nombre del clinte" readonly>
          </div>

          <!-- Entrada de Telefono -->
          <div class="form-group">
            <label for="message-text">Telefono:</label>
            <input type="text" class="form-control" name="nuevoTelefonoC" placeholder="Ingrese el telefono" required>
          </div>

          <!-- Entrada de correo -->
          <div class="form-group">
            <label for="message-text">Correo:</label>
            <input type="email" class="form-control" name="nuevoCorreoC" placeholder="Ingrese el correo" required>
          </div>

          <!-- Entrada de direccion -->
          <div class="form-group">
            <label for="message-text">Contacto emergencia:</label>
            <input type="text" class="form-control" name="nuevoContactoC" placeholder="Ingrese el contacto" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Guardar</button>
          </div>

          <!-- Guardamos los datos del cliente -->
          <?php

          $crearCliente = new ControladorClientes();
          $crearCliente->ctrCrearCliente();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ===========================================
    MODAL EDITAR CLIENTE
    =========================================== -->

<div class="modal fade" id="mdlEditarCliente" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Editar cliente</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de ID escondido -->
          <div class="form-group">
            <input type="hidden" class="form-control" name="idCliente" id="idCliente" value="" required>
          </div>

          <!-- Entrada de nombre -->
          <div class="form-group">
            <label for="recipient-name">Nombre:</label>
            <input type="text" class="form-control" name="editarNombreC" id="editarNombreC" value="" required>
          </div>

          <!-- Entrada de telefono -->
          <div class="form-group">
            <label for="message-text">Teléfono:</label>
            <input type="text" class="form-control" name="editarTelefonoC" id="editarTelefonoC" value="" required>
          </div>

          <!-- Entrada de correo -->
          <div class="form-group">
            <label for="message-text">Correo:</label>
            <input type="text" class="form-control" name="editarCorreoC" id="editarCorreoC" value="" required>
          </div>

          <!-- Entrada de contacto de emergencia -->
          <div class="form-group">
            <label for="message-text">Contacto de emergencia:</label>
            <input type="text" class="form-control" name="editarContactoC" id="editarContactoC" value="" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Modificar usuario</button>
          </div>

          <!-- Guardamos los datos del usuario -->
          <?php

          $editarCliente = new ControladorClientes();
          $editarCliente->ctrEditarCliente();


          ?>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- ===========================================
    ELIMINAR CLIENTE
    =========================================== -->

<?php

$borrarCliente = new ControladorClientes();
$borrarCliente->ctrBorrarCliente();
?>