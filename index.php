<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/marcas.controlador.php";
require_once "controladores/madelas.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/proveedor.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/reportes.controlador.php";

require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/marcas.modelo.php";
require_once "modelos/madelas.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/proveedor.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/reportes.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();