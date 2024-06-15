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
            <h4><b>Administrar materiales</b></h4>
          </div>
          <div class="mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlMaterial" data-whatever="@getbootstrap">Nuevo material</button>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table tabla_material">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Proveedor</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                      <th>Marca</th>
                      <th>Cantidad</th>
                      <th>Precio U. compra</th>
                      <th>Precio U. venta</th>
                      <th>Fecha</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $materiales = ControladorMateriales::ctrMostrarMateriales($item, $valor);

                    foreach ($materiales as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre_proveedor"] . '</td>
                              <td>' . $value["nombre_material"] . '</td>
                              <td>' . $value["tipo_material"] . '</td>
                              <td>' . $value["marca_material"] . '</td>
                              <td>' . $value["cantidad_material"] . '</td>
                              <td>S/ ' . $value["precio_compra_material"] . '</td>
                              <td>S/ ' . $value["precio_venta_material"] . '</td>
                              <td>' . $value["fecha_material"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-warning btnEditarMaterial" idMaterial="' . $value["id_material"] . '" data-toggle="modal" data-target="#mdlEditarMaterial" data-whatever="@getbootstrap"><i class="mdi mdi-pencil"></i></button>
                                  <button class="btn btn-danger btnEliminarMaterial" idMaterial="' . $value["id_material"] . '"><i class="mdi mdi-delete"></i></button>
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
    MODAL NUEVO MATERIAL
    =========================================== -->

<div class="modal fade" id="mdlMaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Nuevo material</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Entrada de nombre del proveedor -->
          <div class="form-group">
            <label for="recipient-name">Nombre proveedor:*</label>
            <select name="nuevoNombreProveedor" id="nuevoNombreProveedor" class="form-control">
              <option value="">Seleccione proveedor</option>
              <?php
              $item = null;
              $valor = null;

              $proveedor = ControladorProveedores::ctrMostrarProveedor($item, $valor);
              foreach ($proveedor as $key => $value) {
                echo '<option value="' . $value["id_proveedor"] . '">' . $value["nombre_proveedor"] . '</option>';
              }
              ?>
            </select>
          </div>

          <!-- Entrada de nombre material-->
          <div class="form-group">
            <label for="recipient-name">Nombre del material:*</label>
            <input type="text" class="form-control" name="nuevoNombreM" placeholder="Ingrese el el nombre" required>
          </div>

          <!-- Entrada de tipo de material -->
          <div class="form-group">
            <label for="message-text">Tipo de material:</label>
            <input type="text" class="form-control" name="nuevoTipoM" placeholder="Ingrese el tipo">
          </div>

          <!-- Entrada de marca de material -->
          <div class="form-group">
            <label for="message-text">Marca de material:</label>
            <input type="text" class="form-control" name="nuevoMarcaM" placeholder="Ingresa la marca">
          </div>

          <!-- Entrada de cantidad de material -->
          <div class="form-group">
            <label for="message-text">Cantidad de material:*</label>
            <input type="number" class="form-control" name="nuevoCantidadM" placeholder="Ingrese la cantidad" required>
          </div>

          <!-- Entrada de precio de compra -->
          <div class="form-group">
            <label for="message-text">Precio compra material:*</label>
            <input type="number" class="form-control" name="nuevoPrecioCompraM" placeholder="Ingrese le precio" step="any" required>
          </div>

          <!-- Entrada de precio de venta -->
          <div class="form-group">
            <label for="message-text">Precio venta material:*</label>
            <input type="number" class="form-control" name="nuevoPrecioVentaM" placeholder="Ingrese le precio" step="any" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Guardar</button>
          </div>

          <!-- Guardamos los datos del material -->
          <?php

          $crearMaterial = new ControladorMateriales();
          $crearMaterial->ctrCrearMateriales();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ===========================================
    MODAL EDITAR MATERIAL
    =========================================== -->

<div class="modal fade" id="mdlEditarMaterial" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
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

          <!-- Entrada de ID escondido -->
          <div class="form-group">
            <input type="hidden" class="form-control" name="idMaterial" id="idMaterial" value="" required>
          </div>


          <!-- Entrada de nombre del proveedor -->
          <div class="form-group">
            <label for="recipient-name">Nombre proveedor:</label>
            <select name="editarProveedor" class="form-control">
              <option id="editarProveedor"></option>
              <?php
              $item = null;
              $valor = null;

              $proveedor = ControladorProveedores::ctrMostrarProveedor($item, $valor);
              foreach ($proveedor as $key => $value) {
                echo '<option value="' . $value["id_proveedor"] . '">' . $value["nombre_proveedor"] . '</option>';
              }
              ?>
            </select>
          </div>

          <!-- Entrada de nombre del material -->
          <div class="form-group">
            <label for="recipient-name">Nombre del material:</label>
            <input type="text" class="form-control" name="editarNombreM" id="editarNombreM" value="" required>
          </div>

          <!-- Entrada de tipo de material -->
          <div class="form-group">
            <label for="message-text">Tipo de material:</label>
            <input type="text" class="form-control" name="editarTipoM" id="editarTipoM" value="" >
          </div>

          <!-- Entrada de marca de material -->
          <div class="form-group">
            <label for="message-text">Marca de material:</label>
            <input type="text" class="form-control" name="editarMarcaM" id="editarMarcaM" value="" >
          </div>

          <!-- Entrada de Cantidad de material -->
          <div class="form-group">
            <label for="message-text">Cantidad de material:</label>
            <input type="number" class="form-control" name="editarCantidadM" id="editarCantidadM" value="" required>
          </div>

          <!-- Entrada de precio compra de material-->
          <div class="form-group">
            <label for="message-text">Precio compra del material:</label>
            <input type="number" class="form-control" name="editarCompraM" id="editarCompraM" value="" step="any" required>
          </div>

          <!-- Entrada de precio venta de material -->
          <div class="form-group">
            <label for="message-text">Precio venta del material:</label>
            <input type="number" class="form-control" name="editarVentaM" id="editarVentaM" value="" step="any" required>
          </div>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
            <button type="submit" class="btn btn-primary" style="margin-right: auto;">Modificar usuario</button>
          </div>

          <!-- Guardamos los datos del usuario -->
          <?php

          $editarMaterial = new ControladorMateriales();
          $editarMaterial->ctrEditarMateriales();

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

$borrarMaterial = new ControladorMateriales();
$borrarMaterial->ctrBorrarMateriales();
?>