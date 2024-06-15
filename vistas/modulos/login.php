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

$maquinas = ControladorEquiposMaquinarias::ctrMostrarEquiposMaquinarias($item, $valor);
$totalMaquinas = count($maquinas);

?>

<header>
    <nav class="navbar navbar-expand-lg navbar-lg navbar-dark bg-dark landing">
        <div class="container">
            <a class="navbar-brand" href="#"><img width="110" src="vistas/estilos/images/logo/logo-house.png" alt="lead-ui-kit logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#leadUIMainNav" aria-controls="leadUIMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="leadUIMainNav">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quienesSomos">Quienes somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#proyectos">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactoCliente">Contactos</a>
                    </li>
                </ul>
                <div class="form-inline">
                    <?php
                    $item = null;
                    $valor = null;

                    $contarUsuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
                    if (count($contarUsuarios) <= 0) {
                    ?>
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#registro_usuario" data-whatever="@fat">Registrarse</button>
                    <?php
                    } else {
                    ?>
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#iniciar_sesion" data-whatever="@fat">Iniciar Sesión</button>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <div class="landing-sass-header-content bg-dark">
        <div class="container">
            <h1 class="text-center font-weight-bold pt-5 pb-30px mb-0 text-white">Proyectos de calidad <br>Cambiando vidas</h1>
            <div class="text-center mb-5 ">
                <a class="btn btn-light mr-3" href="#proyectos">Ver mas...</a>
                <a class="btn btn-outline-light" href="#contactoCliente">Contactos</a>
            </div>
        </div>
    </div>
    <div class="text-center landing-sass-header-img-wrapper"><img src="vistas/estilos/images/dash/dash_3.png" alt="header-img" class="img-fluid" width="707px"></div>
</header>

<main>
    <div class="container">
        <!-- ============ QUIENES SOMOS =============== -->
        <section class="mb-5" id="quienesSomos">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-3">¿Quienes somos?</h1>
                    <p class="text-muted">En P House E.I.R.L. Construcciones, nos dedicamos a materializar sueños y construir futuros sólidos. Desde 2010, hemos sido líderes en la industria de la construcción, llevando a cabo proyectos que van más allá de estructuras; creamos espacios que inspiran y perduran.</p>
                    <p class="text-muted">En el mundo de la construcción, somos más que constructores; somos creadores de entornos que inspiran, edificamos hogares que albergan sueños y levantamos estructuras que definen comunidades. Desde nuestra fundación en 2009, hemos liderado el camino en la industria, fusionando la visión innovadora con la artesanía tradicional.</p>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-6 mb-5 d-flex align-items-center justify-content-center">
                            <span class="h1 mb-0 mr-2 text-primary font-weight-bold"><?php echo $totalPresupuestos ?></span>
                            <span>Proyectos</span>
                        </div>
                        <div class="col-sm-6 mb-5 d-flex align-items-center justify-content-center">
                            <span class="h1 mb-0 mr-2 text-primary font-weight-bold"><?php echo $totalTrabajadores ?></span>
                            <span>Trabajadores</span>
                        </div>
                        <div class="col-sm-6 mb-5 d-flex align-items-center justify-content-center">
                            <span class="h1 mb-0 mr-2 text-primary font-weight-bold"><?php echo $totalClientes ?></span>
                            <span>Clientes</span>
                        </div>
                        <div class="col-sm-6 mb-5 d-flex align-items-center justify-content-center">
                            <span class="h1 mb-0 mr-2 text-primary font-weight-bold"><?php echo $totalMaquinas ?></span>
                            <span>Máquinas</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-3">
                    <img width="100%" height="200px" src="vistas/img/proyectos/img.01.jpg" alt="">
                </div>
                <div class="col-md-3">
                    <img width="100%" height="200px" src="vistas/img/proyectos/img.02.jpg" alt="">
                </div>
                <div class="col-md-3">
                    <img width="100%" height="200px" src="vistas/img/proyectos/img.03.jpg" alt="">
                </div>
                <div class="col-md-3">
                    <img width="100%" height="200px" src="vistas/img/proyectos/img.04.jpg" alt="">
                </div>
            </div>
        </section>
        <section class="mb-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <h3 class="font-weight-bold">Misión</h3>
                                <p class="text-gray mb-4">En P House E.I.R.L. Construcciones, nuestra misión es materializar sueños y construir futuros sólidos. Desde 2010, lideramos la industria de la construcción, llevando a cabo proyectos que van más allá de simples estructuras. Nos dedicamos a crear espacios inspiradores y duraderos que reflejen la visión y los sueños de nuestros clientes. Nuestro compromiso con la innovación y la artesanía tradicional nos impulsa a ser más que constructores; somos creadores de entornos que transforman vidas y definen comunidades.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 mb-3">
                            <div class="card-body">
                                <h3 class="font-weight-bold">Visión</h3>
                                <p class="text-gray mb-4">Nos vemos como líderes visionarios en la industria de la construcción, reconocidos por nuestra capacidad para fusionar la innovación con la artesanía tradicional. Buscamos ser la elección preferida de aquellos que buscan no solo una construcción, sino la creación de un hogar que albergue sus sueños. Queremos ser recordados como una empresa que trasciende las expectativas, inspira confianza y contribuye al desarrollo sostenible de las comunidades que servimos. A medida que avanzamos, continuaremos definiendo el estándar de excelencia en construcción y diseño, guiados por nuestra pasión por crear entornos que perduran en el tiempo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ LISTA DE PROYECTOS ==================== -->
        <section class="py-3" id="proyectos">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <p class="h1 text-center">Proyectos</p>
                        <p class="text-gray text-center">Con 30 años de experiencia, lideramos proyectos de construcción innovadores y de alta calidad, fusionando visión creativa con ejecución precisa para transformar ideas en realidad duradera.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-5 mb-5">
            <div class="container">
                <div class="row">
                    <!-- Lista de proyectos -->
                    <?php
                    $ListaProyectos = ControladorProyecto::ctrMostrarProyectos($item, $valor);
                    foreach ($ListaProyectos as $key => $value) {
                    ?>
                        <div class="col-md-6">
                            <div class="card border-0 mb-3">
                                <div class="card-body">
                                    <?php

                                    $fechaOriginal = $value["fecha_proyecto"];
                                    setlocale(LC_TIME, 'es_PE.UTF-8'); // Establecer la configuración regional a español peruano

                                    $fechaFormateada = strftime('%d de %B del %Y', strtotime($fechaOriginal));
                                    ?>
                                    <span class="text-muted small font-weight-bold d-inline-block mb-2"><?php echo $fechaFormateada ?></span>
                                    <h3 class="font-weight-bold"><?php echo $value["nombre_proyecto"] ?></h3>
                                    <a href="#" id="VerMas">Ver más...</a>
                                    <div class="descripcion-ampliada">
                                        <?php echo $value["descri_proyecto"] ?>
                                    </div>
                                    <a href="#" id="VerMenos">Ver menos...</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <section id="contactoCliente" class="mb-4 container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h2><b>Contactos</b></h2>
                        </div>
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nuevoNombreCl" placeholder="Ingrese su nombre">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nuevoApellidoCl" placeholder="Ingrese su apellido">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nuevoTelefonoCl" placeholder="Ingrese su teléfono">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="nuevoCorreoCl" placeholder="Ingrese su correo">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                                </div>
                                <?php
                                /* Guardar contacto */

                                $nuevoContacto = new ControladorContactos();
                                $nuevoContacto->ctrCrearContacto();

                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<div class="container">
    <footer class="lead-footer shadow px-5">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="footer-brand-wrapper"><img src="vistas/estilos/images/logo/logo-house.png" alt="logo white" width="100"></div>
                <p class="pb-1 mb-4">Construimos sueños con calidad y experiencia. Confíe en P HOUSE E.I.R.L. para proyectos excepcionales y duraderos.</p>
            </div>
            <div class="col-lg-6 ml-md-auto">
                <div class="row">
                    <div class="col-sm">
                        <nav class="nav footer-nav nav-vertical my-5 my-md-0">
                            <a href="#inicio" class="nav-link">Inicio</a>
                            <a href="#quienesSomos" class="nav-link">Quienes somos</a>
                            <a href="#proyectos" class="nav-link">Proyectos</a>
                            <a href="#contactos" class="nav-link">Contactos</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-column flex-sm-row flex-wrap justify-content-between mt-4">
                <nav class="lead-social-menu mb-4 mb-sm-0">
                    <a href="#!"><i class="mdi mdi-twitter-box"></i></a>
                    <a href="#!"><i class="mdi mdi-facebook-box"></i></a>
                    <a href="#!"><i class="mdi-linkedin-box"></i></a>
                    <a href="#!"><i class="mdi mdi-instagram"></i></a>
                </nav>
                <p class="footer-text text-gray order-sm-first">©2023 Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</div>



<!-- ========================
LOGIN
======================== -->

<!-- =====================================
MODAL INICIAR SESION
===================================== -->

<div class="modal fade" id="iniciar_sesion" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><b>Iniciar Sessión</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="pt-2" method="post" id="form_inicio_session" enctype="multipart/form-data">

                    <!-- ====================================
                                INGRESANDO USUARIO
                                ==================================== -->
                    <div class="form-group">
                        <label for="Usuario">Usuario</label>
                        <input type="text" class="form-control form-control-lg" id="ingUsuario" name="ingUsuario" placeholder="Usuario">
                    </div>

                    <!-- ====================================
                                INGRESANDO CONTRASEÑA
                                ==================================== -->
                    <div class="form-group">
                        <label for="Usuario">Constraseña</label>
                        <input type="password" class="form-control form-control-lg" id="ingPassword"  name="ingPassword" placeholder="Constraseña">
                    </div>

                    <!-- ====================================
                                BOTON DE INGRESAR
                                ==================================== -->
                    <div class="mt-3">
                        <button type="submit" id="btn_ingresar"  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Ingresar</button>
                    </div>

                    <!-- ====================================
                                CONTROLADOR INGRESO USUARIO
                                ==================================== -->

                    <?php

                    $login = new ControladorUsuarios();
                    $login->ctrIngresoUsuario();

                    ?>

                </form>
            </div>

        </div>
    </div>
</div>



<!-- =====================================
MODAL REGISTRAR USUARIOS
===================================== -->
<div class="modal fade" id="registro_usuario" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalLabel"><b>Registrarse</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="pt-2" method="post" id="form_registrase" enctype="multipart/form-data">

                    <!-- ENTRADA DE NOMBRE -->
                    <div class="form-group">
                        <label for="Usuario">Nombre</label>
                        <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar nombre" >
                    </div>

                    <!-- ENTRADA DE USUARIO -->
                    <div class="form-group">
                        <label for="Usuario">Usuario o correo</label>
                        <input type="text" class="form-control"  id="nuevoUsuario" name="nuevoUsuario" placeholder="Ingresar usuario o correo" >
                    </div>

                    <!-- ENTRADA DE CONTRASEÑA -->
                    <div class="form-group">
                        <label for="Usuario">Constraseña</label>
                        <input type="password" class="form-control" id="nuevoPassword" name="nuevoPassword" placeholder="Ingresar constraseña" >
                    </div>

                    <!-- ENTRADA DE PERFIL -->
                    <div class="form-group">
                        <label for="Usuario">Constraseña</label>
                        <select class="form-control form-control-lg" id="nuevoPerfil" name="nuevoPerfil" >
                            <option value="">Seleccionar perfil</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>

                    <!-- BOTON PARA GUARDAR -->
                    <div class="mt-3">
                        <button type="submit" id="registrarse" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrar</button>
                    </div>


                    <!-- ===============================
                                REGISTRAMOS
                                =============================== -->
                    <?php
                    $crearUsuario = new ControladorUsuarios();
                    $crearUsuario->ctrCrearUsuario();
                    ?>

                </form>
            </div>
        </div>
    </div>
</div>