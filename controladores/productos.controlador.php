<?php

class ControladorProductos
{

	/*=============================================
	AQUI SE MOSTRARRA EL PRODUCTOOOOOOOOO
	=============================================*/

	static public function ctrMostrarProductos($item, $valor, $orden)
	{

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

		return $respuesta;
	}


	/*=============================================
	CREAR PRODUCTO
	=============================================*/

	static public function ctrCrearProducto()
	{

		if (isset($_POST["nuevaDescripcion"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaMedida"]) ||
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaDescripcion"]) ||
				preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"]) &&
				preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"])
			) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "vistas/img/productos/default/anonymous.png";

				if (isset($_FILES["nuevaImagen"]["tmp_name"])   && !empty($_FILES["nuevaImagen"]["tmp_name"])) {


					list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/" . $_POST["nuevoCodigo"];

					if (!file_exists($directorio)) {
						mkdir($directorio, 0755);
					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["nuevaImagen"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["nuevaImagen"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/productos/" . $_POST["nuevoCodigo"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
					if($_FILES["nuevaImagen"]["type"] == "image/webp"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".webp";

						$origen = imagecreatefromwebp($_FILES["nuevaImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagewebp($destino, $ruta);

					}

				}
				//print_r($_POST);				
				$tabla = "productos";
				// corriger datos lo que viene del formulario id_marca id_madela
				$datos = array(
					"id_categoria" => $_POST["nuevaCategoria"],
					"id_marca" => $_POST["nuevaMarca"], // Asegúrate de que este campo exista en el formulario html
					"id_madela" => $_POST["nuevaMadela"], //Asegúrate de que este campo exista en el formulario html
					"codigo" => $_POST["nuevoCodigo"],
					
					"descripcion" => $_POST["nuevaDescripcion"],
					"medida" => $_POST["nuevaMedida"],
					"stock" => $_POST["nuevoStock"],
					"precio_venta" => $_POST["nuevoPrecioVenta"],
					"precio_compra" => $_POST["nuevoPrecioCompra"],
					"imagen" => $ruta
				);
				//print_r(value: $datos);
				// tus tatos anteriores
				// $datos = array("id_categoria" => $_POST["nuevaCategoria"],

				// 			   "codigo" => $_POST["nuevoCodigo"],

				// 			   "descripcion" => $_POST["nuevaDescripcion"],
				// 			   "stock" => $_POST["nuevoStock"],
				// 			   "precio_venta" => $_POST["nuevoPrecioVenta"],
				// 			   "precio_compra" => $_POST["nuevoPrecioCompra"],
				// 			   "imagen" => $ruta);


				$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);
				if ($respuesta == "ok") {

					echo '<script>

				swal({
					  type: "success",
					  title: "El producto ha sido guardado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';
				}
			} else {

				echo '<script>

				swal({
					  type: "error",
					  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
						if (result.value) {

						window.location = "productos";

						}
					})

			  </script>';
			}
		}
	}

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/

	static public function ctrEditarProducto()
	{

		if (isset($_POST["editarDescripcion"])) {

			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) ||
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMedida"]) ||
				preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"]) &&
				preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"])
			) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["imagenActual"];

				if (isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/productos/" . $_POST["editarCodigo"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if (!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png") {

						unlink($_POST["imagenActual"]);
					} else {

						mkdir($directorio, 0755);
					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["editarImagen"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarImagen"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/productos/" . $_POST["editarCodigo"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
					
					if($_FILES["editarImagen"]["type"] == "image/webp"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".webp";

						$origen = imagecreatefromwebp($_FILES["editarImagen"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagewebp($destino, $ruta);

					}
				}

				$tabla = "productos";

				$datos = array(
					"id_categoria" => $_POST["editarCategoria"],
					"codigo" => $_POST["editarCodigo"],
					"descripcion" => $_POST["editarDescripcion"],
					"medida" => $_POST["editarMedida"],
					"stock" => $_POST["editarStock"],
					"precio_venta" => $_POST["editarPrecioVenta"],
					"precio_compra" => $_POST["editarPrecioCompra"],
					"imagen" => $ruta
				);

				$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script>

						swal({
							  type: "success",
							  title: "El producto ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';
				}
			} else {

				echo '<script>

					swal({
						  type: "error",
						  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "productos";

							}
						})

			  	</script>';
			}
		}
	}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	static public function ctrEliminarProducto()
	{

		if (isset($_GET["idProducto"])) {

			$tabla = "productos";
			$datos = $_GET["idProducto"];

			if ($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png") {

				unlink($_GET["imagen"]);
				rmdir('vistas/img/productos/' . $_GET["codigo"]);
			}

			$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "productos";

								}
							})

				</script>';
			}
		}
	}


	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/

	static public function ctrMostrarSumaVentas()
	{

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR PRODUCTOS SEGUN CATEGORIA
	=============================================*/
	static public function ctrMostrarProductosSegunCategoria($idCategoria)
	{

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlProductoPorCategoriaPdf($tabla, $idCategoria);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR PRODUCTOS SEGUN CATEGORIA
	=============================================*/
	static public function ctrMostrarProductosFaltante()
	{

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlProductoFaltantePdf($tabla);

		return $respuesta;
	}
}
