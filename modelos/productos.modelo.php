<?php

require_once "conexion.php";

class ModeloProductos{

/*=============================================
MOSTRAR PRODUCTOS con INNER JOIN para unir tablas de marcas y madelas
=============================================*/

static public function mdlMostrarProductos($tabla, $item, $valor, $orden) {

	// Si se proporciona un criterio de búsqueda específico
	if ($item != null) {
			$stmt = Conexion::conectar()->prepare("SELECT p.*, m.marca AS nombre_marca, md.madela AS nombre_madela
																							FROM $tabla AS p
																							INNER JOIN marcas AS m ON p.id_marca = m.id
																							INNER JOIN madelas AS md ON p.id_madela = md.id
																							WHERE p.$item = :$item
																							ORDER BY p.id DESC");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
			
	} else { // Si no se proporciona un criterio de búsqueda
			$stmt = Conexion::conectar()->prepare("SELECT p.*, m.marca AS nombre_marca, md.madela AS nombre_madela
																							FROM $tabla AS p
																							INNER JOIN marcas AS m ON p.id_marca = m.id
																							INNER JOIN madelas AS md ON p.id_madela = md.id
																							ORDER BY $orden DESC");

			$stmt->execute();

			return $stmt->fetchAll();
	}

	$stmt->close();
	$stmt = null;
}




/*=============================================
REGISTRO DE PRODUCTO
=============================================*/

static public function mdlIngresarProducto($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, id_marca, id_madela, codigo,descripcion,medida, imagen, stock, precio_venta, precio_compra) 
																				 VALUES (:id_categoria, :id_marca, :id_madela, :codigo, :descripcion,:medida, :imagen, :stock, :precio_venta, :precio_compra)");

	$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
	$stmt->bindParam(":id_marca", $datos["id_marca"], PDO::PARAM_INT);
	$stmt->bindParam(":id_madela", $datos["id_madela"], PDO::PARAM_INT);
	$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
	$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
	$stmt->bindParam(":medida", $datos["medida"], PDO::PARAM_STR);
	$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
	$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_INT);
	$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
	$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);

	if($stmt->execute()){
			return "ok";
	} else {
			return "error";
	}

	$stmt->close();
	$stmt = null;
}


    /*=============================================
	EDITAR PRODUCTO
	=============================================*/
	static public function mdlEditarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria,descripcion = :descripcion,medida = :medida, imagen = :imagen, stock = :stock,  precio_venta = :precio_venta, precio_compra = :precio_compra WHERE codigo = :codigo");

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":medida", $datos["medida"], PDO::PARAM_STR);
		$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
      
	}


	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

	static public function mdlEliminarProducto($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR PRODUCTO
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

	static public function mdlMostrarSumaVentas($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	PRODUCTO SEGUN CATEGORIA
	=============================================*/	
	static public function mdlProductoPorCategoriaPdf($tabla, $idCategoria)
	{

		$query = "SELECT productos.*, c.categoria AS categoria
		FROM $tabla 
		JOIN categorias AS c ON productos.id_categoria=c.id";

		// Añadir la condición del proveedor si $idProveedor no es 0
		$query .= ($idCategoria == 0) ? "" : " WHERE  c.id = $idCategoria";

		$stmt = Conexion::conectar()->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll();
	}

	/*=============================================
	PRODUCTO SEGUN CATEGORIA
	=============================================*/	
	static public function mdlProductoFaltantePdf($tabla)
	{

		$query = "SELECT * FROM $tabla WHERE productos.stock<=0";


		$stmt = Conexion::conectar()->prepare($query);

		$stmt->execute();

		return $stmt->fetchAll();
	}


}





