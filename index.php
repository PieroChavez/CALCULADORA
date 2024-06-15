<?php

/*===== CONSTROLADORES =====*/

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/materiales.controlador.php";
require_once "controladores/trabajadores.controlador.php";
require_once "controladores/equipos.maquinas.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/proyectos.controladores.php";
require_once "controladores/pres.materiales.controlador.php";
require_once "controladores/pres.trabajador.controlador.php";
require_once "controladores/pres.terreno.controlador.php";
require_once "controladores/presupuesto.controlador.php";
require_once "controladores/contacto.cliente.controlador.php";

/*===== MODELOS =====*/
require_once "modelos/usuarios.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/materiales.modelo.php";
require_once "modelos/trabajadores.modelo.php";
require_once "modelos/equipos.maquinas.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/proyecto.modelo.php";
require_once "modelos/pres.materiales.modelo.php";
require_once "modelos/pres.trabajador.modelo.php";
require_once "modelos/pres.terreno.modelo.php";
require_once "modelos/presupuesto.modelo.php";
require_once "modelos/contacto.cliente.modelo.php";

/*===== INSTANCIA DE PLANTILLA =====*/

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();