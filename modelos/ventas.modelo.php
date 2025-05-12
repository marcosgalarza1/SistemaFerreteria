<?php

require_once "conexion.php";

class ModeloVentas
{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

	static public function mdlMostrarVentas($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id  ASC ");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC ");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}

	static public function mdlMostrarDetalleVentas($idVenta) {
		if ($idVenta != null) {
			// Preparar la consulta SQL correctamente
			$stmt = Conexion::conectar()->prepare("SELECT * FROM detalle_venta WHERE id_venta = :id_venta ORDER BY id ASC");
	
			// Enlazar el parámetro correctamente
			$stmt->bindParam(":id_venta", $idVenta, PDO::PARAM_INT); // Cambiado a PDO::PARAM_INT si el ID es un entero
	
			// Ejecutar la consulta
			$stmt->execute();
	
			// Devolver todos los resultados en lugar de solo uno
			return $stmt->fetchAll(PDO::FETCH_ASSOC); // Cambiado a fetchAll para obtener todos los registros
		}
	
		// No se necesita cerrar el stmt aquí si no se ejecuta
		return null; // Devolver null si no hay ID de compra
	}


	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

	static public function mdlIngresarVenta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor, productos, total) VALUES (:codigo, :id_cliente, :id_vendedor, :productos,  :total)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
		

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}


	static public function mdlRegistrarVenta($tabla, $datos) {
		// Conexión a la base de datos
		$conexion = Conexion::conectar();
	
		try {
			// Iniciar la transacción
			$conexion->beginTransaction();
	
			// 1. Registrar la venta principal en la tabla "ventas"
			$stmt = $conexion->prepare("INSERT INTO $tabla(codigo, id_cliente, id_vendedor, total) VALUES (:codigo, :id_cliente, :id_vendedor,  :total)");

			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
			$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);

			if (!$stmt->execute()) {
				throw new Exception("Error al registrar la venta");
			}
	
			// Obtener el ID de la venta recién registrada
			$idVenta = $conexion->lastInsertId();
	
			// 2. Preparar el statement para insertar los productos en "detalle_venta"
			$stmtDetalle = $conexion->prepare("INSERT INTO detalle_venta(id_venta, id_producto, producto, cantidad, precio_venta, precio_compra, subtotal) 
											   VALUES (:id_venta, :id_producto, :producto, :cantidad, :precio_venta, :precio_compra, :subtotal)");
	
			// Enlazamos los parámetros estáticos (que no cambian en el bucle)
			$stmtDetalle->bindParam(":id_venta", $idVenta, PDO::PARAM_INT);

			$productos = json_decode($datos["productos"], true);  // true para convertir a array asociativo
			
			// 3. Iterar sobre los productos para registrar el detalle de la venta
			foreach ($productos as $producto) {
				// Validar que las claves necesarias están definidas
				if (!isset($producto["id"], $producto["descripcion"], $producto["cantidad"], $producto["precio"], $producto["precioCompra"], $producto["total"])) {
					throw new Exception("Error: Producto incompleto. Asegúrate de que contiene id, descripcion, cantidad, precioVenta, precioCompra y subtotal.");
				}
				// Enlazar los parámetros dinámicos
				$stmtDetalle->bindValue(":id_producto", $producto["id"], PDO::PARAM_INT);
				$stmtDetalle->bindValue(":producto", $producto["descripcion"], PDO::PARAM_STR);
				$stmtDetalle->bindValue(":cantidad", $producto["cantidad"], PDO::PARAM_INT);
				$stmtDetalle->bindValue(":precio_venta", $producto["precio"], PDO::PARAM_STR);
				$stmtDetalle->bindValue(":precio_compra", $producto["precioCompra"], PDO::PARAM_STR);
				$stmtDetalle->bindValue(":subtotal", $producto["total"], PDO::PARAM_STR);
	
				// Ejecutar el registro para cada producto
				if (!$stmtDetalle->execute()) {
					throw new Exception("Error al registrar el detalle de la venta: " . implode(", ", $stmtDetalle->errorInfo()));
				}
			}
	
			// Confirmar la transacción si todo sale bien
			$conexion->commit();
	
			return "ok";
	
		} catch (Exception $e) {
			// Revertir la transacción en caso de error
			$conexion->rollBack();
			return "error: " . $e->getMessage();
		} finally {
			// Cerrar las conexiones
			$stmt = null;
			$stmtDetalle = null;
			$conexion = null;
		}
	}

	
	/*=============================================
	EDITAR VENTA
	=============================================*/

	static public function mdlEditarVenta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, id_vendedor = :id_vendedor, productos = :productos = : =  total= :total  WHERE codigo = :codigo");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
		$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
		$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
		$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
		
		
		$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
	

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

	static public function mdlEliminarVenta($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}



	/*=============================================
	RANGO FECHAS
	=============================================*/

	static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal)
	{

		if ($fechaInicial == null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		} else if ($fechaInicial == $fechaFinal) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			/* $stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR); */

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");
			} else {


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' ORDER BY id DESC");
			}

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}


	/*=============================================
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

	static public function mdlSumaTotalVentas($tabla)
	{

	$anio = date('Y'); // Obtener el año actual

    $stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla WHERE YEAR(fecha) = :anio");

    $stmt->bindParam(":anio", $anio, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch();

    $stmt->close();
    $stmt = null;
	
	}
	/*=============================================
	SUMAR EL TOTAL DE VENTAS - MES
	=============================================*/

	static public function mdlVentasTotalMes($tabla)
	{
		$yearactual = date('Y');
		$mesActual = date('m');
		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla WHERE MONTH(fecha)='$mesActual' AND YEAR(fecha) = '$yearactual'");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	SUMAR EL TOTAL DE VENTAS - DIA
	=============================================*/

	static public function mdlVentasTotalDia($tabla)
	{
		date_default_timezone_set('America/La_Paz');
		$hoy = date('Y-m-d');
		$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla WHERE DATE(fecha)='$hoy'");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	RANGO DE VENTAS - POR MESERO
	=============================================*/

	public static function mdlRangoFechasVentasPdf($tabla, $fechaInicial, $fechaFinal, $idMesero)
{
    $query = "SELECT ventas.codigo, ventas.fecha, usuarios.nombre as usuario, clientes.nombre as mesero, ventas.total
              FROM $tabla 
              JOIN clientes ON ventas.id_cliente = clientes.id
              JOIN usuarios ON ventas.id_vendedor = usuarios.id
              WHERE DATE(ventas.fecha) BETWEEN DATE(:fechaInicial) AND DATE(:fechaFinal)";

    // Añadir la condición del cliente solo si $idMesero no es 0
    if ($idMesero != 0) {
        $query .= " AND ventas.id_cliente = :idMesero";
    }

    $query .= " ORDER BY ventas.codigo, ventas.fecha DESC";

    // Preparar la consulta
    $stmt = Conexion::conectar()->prepare($query);

    // Enlazar parámetros
    $stmt->bindParam(":fechaInicial", $fechaInicial, PDO::PARAM_STR);
    $stmt->bindParam(":fechaFinal", $fechaFinal, PDO::PARAM_STR);

    // Si $idMesero no es 0, enlazar también el parámetro del cliente
    if ($idMesero != 0) {
        $stmt->bindParam(":idMesero", $idMesero, PDO::PARAM_INT);
    }

    // Ejecutar la consulta
    $stmt->execute();

    // Retornar los resultados
    return $stmt->fetchAll();
}

	/*=============================================
	RANGO DE VENTAS - TOP POR cliente
	=============================================*/
	static public function mdlRangoFechasVentasTopClientesPdf($tabla, $fechaInicial, $fechaFinal)
	{

		if ($fechaInicial <= $fechaFinal) {

			$query = "SELECT clientes.nombre as mesero, COUNT(ventas.id) as cantidad, SUM(ventas.total) as total
					FROM $tabla 
					JOIN clientes ON ventas.id_cliente = clientes.id
					WHERE DATE(ventas.fecha) BETWEEN DATE('$fechaInicial') AND DATE('$fechaFinal') 
					GROUP BY clientes.nombre ORDER BY SUM(ventas.total) DESC;";

			$stmt = Conexion::conectar()->prepare($query);

			$stmt->execute();

			return $stmt->fetchAll();
		}
	}

	/*=============================================
	TOP PRODUCTO MAS VENDIDOS SEGUNN RANGO FECHAS
	=============================================*/
	static public function mdlRangoFechasTopProductoVendidos($tabla, $fechaInicial, $fechaFinal)
	{

		if ($fechaInicial <= $fechaFinal) {

			// Consulta SQL para obtener las ventas en el rango de fechas
			$query	= 	"SELECT 
							COUNT(dv.id_producto) AS cant_ventas, 
							dv.id_producto, 
							SUM(dv.cantidad) AS cantidad, 
							p.descripcion
						FROM $tabla
						JOIN detalle_venta AS dv ON ventas.id = dv.id_venta
						JOIN productos AS p ON p.id = dv.id_producto
						WHERE DATE(ventas.fecha) BETWEEN DATE(:fechaInicio) AND DATE(:fechaFin)
						GROUP BY dv.id_producto, p.descripcion
						ORDER BY SUM(dv.cantidad) DESC;";

			$stmt = Conexion::conectar()->prepare($query);
			// Vincular los parámetros de las fechas
			$stmt->bindParam(':fechaInicio', $fechaInicial);
			$stmt->bindParam(':fechaFin', $fechaFinal);

			$stmt->execute();
			// Obtener los resultados
			$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
			// Devolver los productos más vendidos
			return $ventas;
			// return $stmt->fetchAll();
		}
	}

	static public function mdlRangoFechaVentasRealizadas($tabla, $fechaInicial, $fechaFinal) {

		date_default_timezone_set('America/La_Paz');
	
		$query = "SELECT ventas.id, ventas.codigo, ventas.fecha, usuarios.nombre as usuario, clientes.nombre as cliente, ventas.total
				  FROM $tabla 
				  JOIN usuarios ON ventas.id_vendedor = usuarios.id
				  JOIN clientes ON ventas.id_cliente = clientes.id";
	

		if ($fechaInicial == null && $fechaFinal == null) {
			$stmt = Conexion::conectar()->prepare($query . " ORDER BY ventas.fecha DESC");
			$stmt->execute();
			return $stmt->fetchAll();
		}

		if ($fechaInicial == null) {
			$stmt = Conexion::conectar()->prepare($query . " ORDER BY ventas.fecha DESC");
		} else if ($fechaInicial == $fechaFinal) {
			$stmt = Conexion::conectar()->prepare($query . " WHERE DATE(ventas.fecha) = :fecha ORDER BY ventas.fecha DESC");
			$stmt->bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);
		} else {
			$stmt = Conexion::conectar()->prepare($query . " WHERE DATE(ventas.fecha) BETWEEN DATE(:fechaInicial) AND DATE(:fechaFinal) ORDER BY ventas.fecha DESC");
			$stmt->bindParam(":fechaInicial", $fechaInicial, PDO::PARAM_STR);
			$stmt->bindParam(":fechaFinal", $fechaFinal, PDO::PARAM_STR);
		}
	
		$stmt->execute();
		return $stmt->fetchAll();
	}
	

}
