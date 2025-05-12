<?php

require_once "../controladores/madelas.controlador.php";
require_once "../modelos/madelas.modelo.php";

class AjaxMadelas
{

	/*=============================================
	EDITAR MODELO
	=============================================*/

	public $idMadela;

	public function ajaxEditarMadela()
	{

		$item = "id";
		$valor = $this->idMadela;

		$respuesta = ControladorMadelas::ctrMostrarMadelas($item, $valor);

		echo json_encode($respuesta);
	}

	/*=============================================
	   VALIDAR NO REPETIR TIPO DE PRODUCTO
	   =============================================*/

	public $validarMadela;

	public function ajaxValidarMadela()
	{

		$item = "madela";
		$valor = $this->validarMadela;

		$respuesta = ControladorMadelas::ctrMostrarMadelas($item, $valor);

		echo json_encode($respuesta);
	}
}

/*=============================================
EDITAR MODELO
=============================================*/
if (isset($_POST["idMadela"])) {

	$madela = new AjaxMadelas();
	$madela->idMadela = $_POST["idMadela"];
	$madela->ajaxEditarMadela();
}


/*=============================================
VALIDAR NO REPETIR EL TIPO DE PRODUCTO
=============================================*/

if (isset($_POST["validarMadela"])) {

	$valMadela = new AjaxMadelas();
	$valMadela->validarMadela = $_POST["validarMadela"];
	$valMadela->ajaxValidarMadela();
}
