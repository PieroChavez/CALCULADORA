<?php
if ($_SESSION["perfil"] != "Especial" && $_SESSION["perfil"] != "Administrador") {
  echo '<script>
        window.location = "inicio"
    </script>';
}
?>



<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-body">
          <div class="mb-3">
            <h4><b>Ver presupuestos</b></h4>
          </div>
          <div class="row col-md-12">
            <div class="mb-3 col-md-2">
              <a href="presupuestos" class="btn btn-primary">Nuevo presupuesto</a>
            </div>
          </div>

          <!-- ==================================
          TABLA PRESUPUESTOS
          ================================== -->
          <br><br>
          <div class="mb-3">
            <h4>Tabla de presupuesto</h4>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table ver_presupuesto">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Cliente</th>
                      <th>Proyecto</th>
                      <th>Direccion</th>
                      <th>Costo material</th>
                      <th>costo trabjador</th>
                      <th>costo terreno</th>
                      <th>costo parcial</th>
                      <th>costo presupueto</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $item = null;
                    $valor = null;

                    $presupuestoF = ControladorPresupuesto::ctrVerPresupuesto($item, $valor);

                    foreach ($presupuestoF as $key => $value) {

                      echo '<tr>
                              <td>' . ($key + 1) . '</td>
                              <td>' . $value["nombre_cliente"] . '</td>
                              <td>' . $value["nombre_proyecto"] . '</td>
                              <td>' . $value["ubicacion_proyecto"] . '</td>
                              <td>S/ ' . $value["suma_costo_total_materiales"] . '</td>
                              <td>S/ ' . $value["suma_costo_total_trabajadores"] . '</td>
                              <td>S/ ' . $value["suma_total_terreno"] . '</td>
                              <td>S/ ' . $value["costo_parcial"] . '</td>
                              <td>S/ ' . $value["costo_final"] . '</td>
                              <td>
                                <div class="btn-group text-center">
                                  <button class="btn mr-1 btn-primary btnVerPresupuesto" idProyecto="' . $value["id_proyecto"] . '" data-toggle="modal" data-target="#mdlVerPresupuesto" data-whatever="@getbootstrap"><i class="mdi mdi-eye"></i></button>
                                  <button class="btn btn-info btnImprimir" idProyecto="'.$value["id_proyecto"].'"><i class="mdi mdi-printer"></i></button>
                                  <button class="btn mr-1 btn-danger btnEliminarPresupuesto" idPresupuesto="' . $value["id_proyecto"] . '"><i class="mdi mdi-delete"></i></button>
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
    MODAL VER PRESUPUESTO 
    =========================================== -->

<div class="modal fade" id="mdlVerPresupuesto" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="margin-top: 30px;">
    <div class="modal-content">
      <div class="modal-header">
        <h4 style="margin-left: auto;" class="modal-title" id="ModalLabel"><b>Presupuesto</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">

          <!-- Datos del cliente -->

          <div class="row col-md-12">
            <div class="col-md-4">
              <label for=""><b>Nombre del cliente</b></label>
              <h5 id="nombreCliente"></h5>
            </div>
            <div class="col-md-4">
              <label for=""><b>Teléfono del cliente</b></label>
              <h5 id="telefonoCliente"></h5>
            </div>
            <div class="col-md-4">
              <label for=""><b>Correo del cliente</b></label>
              <h5 id="correoCliente"></h5>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Nombre del proyecto</b></label>
              <h5 id="nombreProyecto"></h5>
            </div>
            <div class="col-md-6">
              <label for=""><b>Ubicación del proyecto</b></label>
              <h5 id="ubicacionProyecto"></h5>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Presupuesto total de materiales:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoMateriales"></h5></b>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Presupuesto total de trabajadores:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoTrabajadores"></h5></b>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Presupuesto total de terreno:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoTerreno"></h5></b>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Porcentaje de ganancia:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoPorcentaje"></h5></b>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Presupuesto de costo parcial:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoCostoParcial"></h5></b>
            </div>
          </div>
          <hr>

          <div class="row col-md-12">
            <div class="col-md-6">
              <label for=""><b>Presupuesto de final:</b></label>
            </div>
            <div class="col-md-6">
              <h5 id="presupuestoFinal"></h5></b>
            </div>
          </div>
          <hr>

          <!-- Botones de guardar y cerrar -->
          <div class="row col-md-auto">
            <button type="button" class="btn btn-light mr-5" data-dismiss="modal" style="margin-left: auto;">Cerrar</button>
          </div>
                   
          <!-- Guardamos los datos del presupuesto -->
          <?php

          $crearPresupuestoF = new ControladorPresupuesto();
          $crearPresupuestoF->ctrCrearPresupuesto();

          ?>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- ========================
BORRAR PRESUPEUSTO
======================== -->

<?php
$borrarPresupuestFinal = new ControladorPresupuesto();
$borrarPresupuestFinal->ctrBorrarPresupuesto();
?>