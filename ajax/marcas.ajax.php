<?php

require_once "../controladores/marcas.controlador.php";
require_once "../modelos/marcas.modelo.php";

class AjaxMarcas
{

	/*=============================================
	EDITAR MARCA
	=============================================*/

	public $idMarca;

	public function ajaxEditarMarca()
	{

		$item = "id";
		$valor = $this->idMarca;

		$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	   VALIDAR NO REPETIR MARCA
	   =============================================*/

	public $validarMarca;

	public function ajaxValidarMarca()
	{

		$item = "marca";
		$valor = $this->validarMarca;

		$respuesta = ControladorMarcas::ctrMostrarMarcas($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR MARCA
=============================================*/
if (isset($_POST["idMarca"])) {

	$marca = new AjaxMarcas();
	$marca->idMarca = $_POST["idMarca"];
	$marca->ajaxEditarMarca();
}


/*=============================================
VALIDAR NO REPETIR MARCA
=============================================*/

if (isset($_POST["validarMarca"])) {

	$valMarca = new AjaxMarcas();
	$valMarca->validarMarca = $_POST["validarMarca"];
	$valMarca->ajaxValidarMarca();
}
