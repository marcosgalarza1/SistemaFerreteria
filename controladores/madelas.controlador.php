<?php

class ControladorMadelas{

	/*=============================================
	CREAR MODELOS
	=============================================*/

	static public function ctrCrearMadela(){

		if(isset($_POST["nuevaMadela"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMadela"])){

				$tabla = "madelas";

				$datos = $_POST["nuevaMadela"];

				$respuesta = ModeloMadelas::mdlIngresarMadela($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "madelas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "madelas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function ctrMostrarMadelas($item, $valor){

		$tabla = "madelas";

		$respuesta = ModeloMadelas::mdlMostrarMadelas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR MODELOS
	=============================================*/

	static public function ctrEditarMadela(){

		if(isset($_POST["editarMadela"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMadela"])){

				$tabla = "madelas";

				$datos = array("madela"=>$_POST["editarMadela"],
							   "id"=>$_POST["idMadela"]);

				$respuesta = ModeloMadelas::mdlEditarMadela($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "madelas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El modelo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "madelas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MODELOS
	=============================================*/

	static public function ctrBorrarMadela(){

		if(isset($_GET["idMadela"])){

			$tabla ="madelas";
			$datos = $_GET["idMadela"];

			$respuesta = ModeloMadelas::mdlBorrarMadela($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El modelo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "madelas";

									}
								})

					</script>';
			}
		}
		
	}
}
