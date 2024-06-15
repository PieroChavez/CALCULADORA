    <?php
    $item = null;
    $valor = null;

    $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
    $totalClientes = count($clientes);

    $materiales = ControladorMateriales::ctrMostrarMateriales($item, $valor);
    $totalMateriales = count($materiales);

    $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
    $totalTrabajadores = count($trabajadores);

    $presupuestos = ControladorPresupuesto::ctrVerPresupuesto($item, $valor);
    $totalPresupuestos = count($presupuestos);

    ?>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-12 pr-0">
                  <div class="d-lg-flex">
                    <h3 class="text-dark font-weight-bold mb-0 mr-5">Hola <?php echo $_SESSION["nombre"] ?>, bienvenido al Sistema😎</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Clientes</h4>
                  <p class="text-small">Total de clientes activos</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-dark font-weight-bold"><?php echo $totalClientes ?><span class="text-muted text-extra-small">/ Clientes</span></h2>
                  </div>
                  <canvas id="customer"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Materiales</h4>
                  <p class="text-small">Total de materiales</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-dark font-weight-bold"><?php echo $totalMateriales ?><span class="text-muted text-extra-small">/ materiales</span></h2>
                  </div>
                  <canvas id="orders"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Trabajadores</h4>
                  <p class="text-small">Total de trabajadores</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-dark font-weight-bold"><?php echo $totalTrabajadores ?><span class="text-muted text-extra-small">/ trabajadores</span></h2>
                  </div>
                  <canvas id="growth"></canvas>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-xl-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Presupuestos</h4>
                  <p class="text-small">Total de presupuestos</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="text-dark font-weight-bold"><?php echo $totalPresupuestos?><span class="text-muted text-extra-small">/ presupuestos</span></h2>
                  </div>
                  <canvas id="revenue"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-12 col-sm-12 col-md-12 col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 pb-0 border-bottom">
                    <div class="px-4">
                    <div class="d-flex justify-content-between mb-2">
                        <h4 class="card-title ml-2">Calendario</h4>
                        <h6><a href="pages/apps/calendar.html" class="text-primary">Mantente al día</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body px-0 pt-1 border-bottom">
                    <div class="px-4">
                      <div id="inline-datepicker-dashboard" class="datepicker inline-datepicker-dashboard"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-xl-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="text-dark">Lista de presupuestos</h3>
                    <div>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="order-listing" class="table tablas_proveedor">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Presupuesto</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $item = null;
                              $valor = null;

                              $proyectoLista = ControladorPresupuesto::ctrVerPresupuesto($item, $valor);

                              foreach ($proyectoLista as $key => $value) {

                                echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["nombre_cliente"] . '</td>
                                        <td>' . $value["nombre_proyecto"] . '</td>
                                        <td>' . $value["costo_final"] . '</td>
                                        <td>' . $value["fecha_presupuesto"] . '</td>
                                        <td>
                                          <div class="btn-group text-center">
                                            <a href="verPresupuestos" class="btn mr-1 btn-info"><i class="mdi mdi-eye"></i></a>
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
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h3 class="text-dark">Lista de contactos de clientes nuevos</h3>
                    <div>
                    <div class="row">
                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="order-listing" class="table tablas_contacto">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Fecha</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $item = null;
                              $valor = null;

                              $contacto = ControladorContactos::ctrMostrarContacto($item, $valor);

                              foreach ($contacto as $key => $value) {

                                echo '<tr>
                                        <td>' . ($key + 1) . '</td>
                                        <td>' . $value["nombre_contacto"] . '</td>
                                        <td>' . $value["apellidos_contacto"] . '</td>
                                        <td>' . $value["telefono_contacto"] . '</td>
                                        <td>' . $value["correo_contacto"] . '</td>
                                        <td>' . $value["fecha_contacto"] . '</td>
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
              </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
        include "footer.php";
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>