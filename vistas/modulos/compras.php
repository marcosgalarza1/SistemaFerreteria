
<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>


<div class="content-wrapper  text-uppercase ">

  <section class="content-header">
  <h1 style="font-family: Arial, sans-serif; font-weight: bold;">
      
      Administrar compras
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio </a></li>
      
      <li class="active">Administrar compras</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="crear-compra">

          <button class="btn btn-warning">
            Agregar compra
          </button>
          </a>

          <!-- <button type="button" class="btn btn-default pull-right" id="daterange-btn-compras">
           
           <span>
             <i class="fa fa-calendar"></i> Rango de fecha
           </span>

           <i class="fa fa-caret-down"></i>

        </button> -->

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas text-uppercase tablaComprasRealizadas" width="100%">
         
        <thead>
         <tr>
           <th style="width:10px">#</th>
           <th>Codigo</th>
           <th>proveedor</th>
           <th>usuario</th>
           <th>total</th>
           <th>fecha</th> 
           <th>acciones</th>
         </tr> 

        </thead>
        <tbody>


        
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorCompras();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
      
      </div>

    </div>

  </section>

</div>
