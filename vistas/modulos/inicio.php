<div class="content-wrapper text-uppercase ">

  <section class="content-header">
    
    <h1>
      Tablero
      <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Tablero</li>
    </ol>

  </section>

  <section class="content">

    <div class="row">
      <?php
      if($_SESSION["perfil"] == "Administrador"){
        include "inicio/cajas-superiores.php";
      }
      ?>
    </div> 

    <div class="row">
      <div class="col-lg-12">
        <?php
        if($_SESSION["perfil"] == "Administrador"){
          include "reportes/grafico-ventas.php";
        }
        ?>
      </div>

      <div class="col-lg-6">
        <?php
        if($_SESSION["perfil"] == "Administrador"){
          include "reportes/productos-mas-vendidos.php";
        }
        ?>
      </div>

      <div class="col-lg-6">
        <?php
        if($_SESSION["perfil"] == "Administrador"){
          include "inicio/productos-recientes.php";
        }
        ?>
      </div>

            <div class="col-lg-12">
        <?php
        if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor"){
          echo '<div class="box box-success">
                  <div class="box-header">
                    <h1>Bienvenid@ ' .$_SESSION["nombre"]. ' Al sistema POS </h1>
                    <img src="vistas/img/plantilla/inicio.jpg" class="responsive-image">
                  </div>
                </div>';
        }
        ?>
      </div>


    </div>

  </section>

</div>

<style>
  .responsive-image {
    width: 60%;
    max-width: auto;
    height: auto;
    display: block;
    margin: 0 auto;
  }
</style>
