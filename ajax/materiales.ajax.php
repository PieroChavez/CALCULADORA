<?php

require_once "../controladores/materiales.controlador.php";
require_once "../modelos/materiales.modelo.php";

class AjaxMaterial{

	/*=============================================
	EDITAR MATERIAL
	=============================================*/	

	public $idMaterial;
	

	public function ajaxEditarMaterial(){

		$item = "id_material";
		$valor = $this->idMaterial;

		$respuesta = ControladorMateriales::ctrMostrarMateriales($item, $valor);

		echo json_encode($respuesta);

	}

	public $idMateriales;

	public function ajaxMostrarMaterial(){

		$item = "id_material";
		$valor = $this->idMateriales;

		$respuesta = ControladorMateriales::ctrMostrarMateriales($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR MATERIAL
=============================================*/
if(isset($_POST["idMaterial"])){

	$editar = new AjaxMaterial();
	$editar -> idMaterial = $_POST["idMaterial"];
	$editar -> ajaxEditarMaterial();

}

/*=============================================
MOSTRAR MATERIAL
=============================================*/
if(isset($_POST["idMateriales"])){

	$editar = new AjaxMaterial();
	$editar -> idMateriales = $_POST["idMateriales"];
	$editar -> ajaxMostrarMaterial();

}
