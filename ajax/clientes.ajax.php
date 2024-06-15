<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxCliente{

	/*=============================================
	EDITAR PROVEEDOR
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id_cliente";
		$valor = $this->idCliente;

        $respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idCliente"])){

	$editar = new AjaxCliente();
	$editar -> idCliente = $_POST["idCliente"];
	$editar -> ajaxEditarCliente();

}
