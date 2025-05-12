<?php

require_once "conexion.php";

class ModeloMadelas{

	/*=============================================
	CREAR MODELOS
	=============================================*/

	static public function mdlIngresarMadela($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(madela) VALUES (:madela)");

		$stmt->bindParam(":madela", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MODELOS
	=============================================*/

	static public function mdlMostrarMadelas($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR MODELO
	=============================================*/

	static public function mdlEditarMadela($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET madela = :madela WHERE id = :id");

		$stmt -> bindParam(":madela", $datos["madela"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR MODELO
	=============================================*/

	static public function mdlBorrarMadela($tabla, $datos){

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

}

