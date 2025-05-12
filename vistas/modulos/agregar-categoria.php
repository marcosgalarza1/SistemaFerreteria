<div class="content-wrapper text-uppercase">
    <!-- Header -->
    <section class="content-header">
        <h1>AGREGAR CATEGORÍA</h1> </strong>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">AGREGAR CATEGORÍA</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form role="form" method="post">
                    <!-- Entrada para el nombre -->
                    <div class="form-group">
                    <h4 for="nuevaCategoria"><strong>Nombre</strong></h4>
                        <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria" placeholder="" required>
                    </div>

                    <!-- Botones -->
                    <div class="text-right">
                    <button type="submit" class="btn btn-success btn-sm" >GUARDAR</button>&nbsp;
                        <a href="categorias" class="btn btn- btn-sm" style="background:#6c757d; color:white">REGRESAR</a>
                      <p></p>
                    </div>
                   
                    <!-- Controlador para crear la categoría -->
                    <?php
                    $crearCategoria = new ControladorCategorias();
                    $crearCategoria->ctrCrearCategoria();
                    ?>
                </form>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
