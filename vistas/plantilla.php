<?php
session_start();

$rutaActual = isset($_GET["ruta"]) ? $_GET["ruta"] : "";

if (!isset($_SESSION["iniciarSesion"]) || $_SESSION["iniciarSesion"] != "ok") {
    if ($rutaActual !== "login") {
        header("Location: index.php?ruta=login");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>



  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>FERROEXPRESS</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/logomini.png">

   <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

 <!-- iCheck for checkboxes and radio inputs -->
 <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

<!-- Daterange picker -->
<link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

<!-- Morris chart -->
<link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">
<!-- Select2 -->
<link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">

  <!--=====================================
  plugin DE java scrip
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->
    <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>



  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="vistas/bower_components/select2/dist/js/select2.full.min.js"></script>
  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  


  
    <!-- InputMask -->
    <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
   <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        

  <!-- jQuery Number -->
    <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>



 

<style>
.skin-blue .main-header .navbar {
 
  background-color: #a04000;

    color: white; /* Cambiar el color del texto a blanco para que sea legible en el degradado oscuro */
  
} 
</style>


<!-- 
resto bar -->
<style>
  .skin-blue .main-header .logo {
    background-color: black;
    color: #fff;
    border-bottom: 0 solid transparent;
    transition: background-color 0.3s, color 0.3s;
  }

  .skin-blue .main-header .logo:hover {

    background-color: #6c757d;

 /* Degradado de naranja a negro */
 
  }
</style>

<!-- 
resto bar -->




<style>

.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
    background-color: black;
}
</style>



<!-- 
logo de = -->

<style>
  .main-header .sidebar-toggle {
    float: left;
  
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
}
</style>








</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page" >
 
  <?php

  if(isset($_GET["ruta"]) && $_GET["ruta"] == "login") {
      include "modulos/login.php";
  } else if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";

    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "agregar-usuario" ||
         $_GET["ruta"] == "categorias" ||       
         $_GET["ruta"] == "agregar-categoria" ||
         $_GET["ruta"] == "editar-categoria" ||
         $_GET["ruta"] == "madelas" ||
         $_GET["ruta"] == "marcas" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "clientes" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" ||
         $_GET["ruta"] == "editar-venta" ||
         $_GET["ruta"] == "compras" ||
         $_GET["ruta"] == "crear-compra" ||
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "reporte-compra" ||
         $_GET["ruta"] == "reporte-venta" ||
         $_GET["ruta"] == "reporte-top-clientes-ventas" ||
         $_GET["ruta"] == "reporte-top-productos" ||
         $_GET["ruta"] == "reporte-categoria" ||
         $_GET["ruta"] == "ver-productos-faltantes" ||
         $_GET["ruta"] == "ganancias-ventas" ||
         $_GET["ruta"] == "proveedor" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';
    include "vistas/plantilla_footer.php";
  }

  ?>


<!-- vinculamos  LAS CARPETAS -->
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/marcas.js"></script>
<script src="vistas/js/madelas.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/compras.js"></script>  
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/proveedor.js"></script>
<script src="vistas/js/ventas.js"></script> 

<!-- ------------------------- -->
<!-- vinculamos  LAS CARPETAS de la tablas dinamicas -->

<script src="vistas/js/tabladinamica/usuariotabla.js"></script>
<script src="vistas/js/tabladinamica/categoriatabla.js"></script>
<script src="vistas/js/tabladinamica/clientetabla.js"></script>
<script src="vistas/js/tabladinamica/proveedortabla.js"></script>
<script src="vistas/js/tabladinamica/comprastabla.js"></script>
<script src="vistas/js/tabladinamica/ventastabla.js"></script>

</body>
</html>
