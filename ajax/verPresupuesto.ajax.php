<?php

require_once "../controladores/presupuesto.controlador.php";
require_once "../modelos/presupuesto.modelo.php";

class AjaxProyecto{

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/	

	public $idProyecto;

	public function ajaxVerProyecto(){

		$item = "id_proyecto";
		$valor = $this->idProyecto;

        $respuesta = ControladorPresupuesto::ctrVerPresupuesto($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idProyecto"])){

	$editar = new AjaxProyecto();
	$editar -> idProyecto = $_POST["idProyecto"];
	$editar -> ajaxVerProyecto();

}
