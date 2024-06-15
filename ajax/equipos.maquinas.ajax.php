<?php

require_once "../controladores/equipos.maquinas.controlador.php";
require_once "../modelos/equipos.maquinas.modelo.php";

class AjaxEM{

	/*=============================================
	EDITAR EQUIPO O MAQUINA
	=============================================*/	

	public $idEM;

	public function ajaxEditarEM(){

		$item = "id_em";
		$valor = $this->idEM;

        $respuesta = ControladorEquiposMaquinarias::ctrMostrarEquiposMaquinarias($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR EQUIPO O MAQUINA
=============================================*/
if(isset($_POST["idEM"])){

	$editar = new AjaxEM();
	$editar -> idEM = $_POST["idEM"];
	$editar -> ajaxEditarEM();

}
