<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedor{

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/	

	public $idProveedor;

	public function ajaxEditarProveedor(){

		$item = "id_proveedor";
		$valor = $this->idProveedor;

        $respuesta = ControladorProveedores::ctrMostrarProveedor($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idProveedor"])){

	$editar = new AjaxProveedor();
	$editar -> idProveedor = $_POST["idProveedor"];
	$editar -> ajaxEditarProveedor();

}
