<?php

if ($_SESSION["perfil"] == "Vendedor") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar modelos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar tipo producto</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn custom-btn" data-toggle="modal" data-target="#modalAgregarMadela">

          Agregar tipo producto

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Producto</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $madelas = ControladorMadelas::ctrMostrarMadelas($item, $valor);

            foreach ($madelas as $key => $value) {
              echo '<tr>
                      <td>' . ($key + 1) . '</td>
                      <td class="text-uppercase">' . $value["madela"] . '</td>
                      <td>
                        <div class="btn-group">
                          <button class="btn btn-warning btnEditarMadela" idMadela="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarMadela">
                            <i class="fa fa-pencil"></i>
                          </button>';
          
              if ($_SESSION["perfil"] == "Administrador") {
                  echo '<button class="btn btn-danger btnEliminarMadela" idMadela="' . $value["id"] . '">
                            <i class="fa fa-times"></i>
                        </button>';
              }
          
              echo '</div>  
                    </td>
                    </tr>';
          }
          

            ?>

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR MODELOS
======================================-->

<div id="modalAgregarMadela" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content custom-content">

      <form role="form" method="post" class="custom-form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header custom-header">

          <button type="button" class="close custom-btn" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" id="nuevaMadela" name="nuevaMadela" placeholder="Agregar producto" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn custom-btn" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn custom-btn">Guardar producto</button>

        </div>

        <?php

        $crearMadela = new ControladorMadelas();
        $crearMadela->ctrCrearMadela();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MODELO
======================================-->

<div id="modalEditarMadela" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content custom-content">
      <form role="form" method="post" class="custom-form">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header custom-header">

          <button type="button" class="close custom-btn" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar producto</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg" name="editarMadela" id="editarMadela" required>

                <input type="hidden" name="idMadela" id="idMadela" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn custom-btn" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn custom-btn">Guardar cambios</button>

        </div>

        <?php

        $editarMadela = new ControladorMadelas();
        $editarMadela->ctrEditarMadela();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarMadela = new ControladorMadelas();
$borrarMadela->ctrBorrarMadela();

?>