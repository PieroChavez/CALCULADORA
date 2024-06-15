    <div class="horizontal-menu">

      <!-- =========================================
      NAV SUPERIOR
      ========================================= -->

      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.html"><img width="100" src="vistas/estilos/images/logo/logo-house.png" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="vistas/estilos/images/logo/logo-house.png" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-2">
              <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Buscar proyectos.." aria-label="buscar">
                </div>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown-navbar">
                  <img src="vistas/img/usuario.png" alt="profile" />
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown flat-dropdown" aria-labelledby="profileDropdown-navbar">
                  <div class="flat-dropdown-header">
                    <div class="d-flex">
                      <img src="vistas/img/usuario.png" alt="profile" class="profile-icon mr-2">
                      <div>
                        <span class="profile-name font-weight-bold"><?php echo $_SESSION["nombre"] ?></span>
                        <p class="profile-designation"><?php echo $_SESSION["perfil"]?></p>
                      </div>
                    </div>
                  </div>
                  <div class="profile-dropdown-body">
                    <ul class="list-profile-items">
                      <li class="profile-item">
                        <a href="salir" class="profile-dropdown-link">
                          <div class="d-flex align-items-center">
                            <i class="mdi mdi-power text-dark"></i>
                            <div>
                              <h5 class="item-title mt-0">Salir</h5>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <img src="https://demo.bootstrapdash.com/dashflat/template/images/sidebar/menu.svg" alt="" class="">
            </button>
          </div>
        </div>
      </nav>

      <!-- =========================================
      NAV INFERIOR
      ========================================= -->

      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">

            <!-- ===================================
            MENU DE NAVEGACIÓN
            =================================== -->

            <!-- Incicio -->
            <li class="nav-item">
              <a class="nav-link" href="inicio">
                <i class="mdi mdi-home mdi-24px text-primary"></i>
                <span class="menu-title">Inicio</span>
              </a>
            </li>

            <?php
            if ($_SESSION["perfil"] == "Administrador") {
            ?>

              <!-- Usuarios -->
              <li class="nav-item">
                <a class="nav-link" href="usuarios">
                  <i class="mdi mdi-account mdi-24px text-primary"></i>
                  <span class="menu-title">Usuarios</span>
                </a>
              </li>
            <?php
            }
            ?>

            <?php
            if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial") {
            ?>

              <!-- Nuevo presupuesto -->
              <li class="nav-item">
                <a class="nav-link" href="presupuestos">
                  <i class="mdi mdi-file-powerpoint mdi-24px text-primary"></i>
                  <span class="menu-title">Presupuesto</span>
                </a>
              </li>

              <!-- Clientes -->
              <li class="nav-item">
                <a href="clientes" class="nav-link">
                  <i class="mdi mdi-account-multiple-outline mdi-24px text-primary"></i>
                  <span class="menu-title">Clientes</span>
                  <i class="menu-arrow"></i></a>
              </li>

              <!-- Proveedores -->
              <li class="nav-item">
                <a href="proveedores" class="nav-link">
                  <i class="mdi mdi-home-modern mdi-24px text-primary"></i>
                  <span class="menu-title">Proveedores</span>
                  <i class="menu-arrow"></i>
                </a>
              </li>

              <!-- Materiales -->
              <li class="nav-item">
                <a href="materiales" class="nav-link">
                  <i class="mdi mdi-cube-unfolded mdi-24px text-primary"></i>
                  <span class="menu-title">Materiales</span>
                  <i class="menu-arrow"></i>
                </a>
              </li>

              <!-- Trabajadores -->
              <li class="nav-item">
                <a href="trabajadores" class="nav-link">
                  <i class="mdi mdi-account-switch mdi-24px text-primary"></i>
                  <span class="menu-title">Trabajadores</span>
                  <i class="menu-arrow"></i></a>
              </li>


              <!-- Equipos y maquinarias -->
              <li class="nav-item">
                <a href="equiposMaquinarias" class="nav-link">
                  <i class="mdi mdi-car mdi-24px text-primary"></i>
                  <span class="menu-title">Equipos y maquinarias</span>
                  <i class="menu-arrow"></i></a>
              </li>

              <!-- Ver todos los presupuestos -->
              <li class="nav-item">
                <a href="verPresupuestos" class="nav-link">
                  <i class="mdi mdi-eye mdi-24px text-primary"></i>
                  <span class="menu-title">Ver presupuestos</span>
                  <i class="menu-arrow"></i></a>
              </li>
            <?php
            }
            ?>

          </ul>
        </div>
      </nav>

    </div>