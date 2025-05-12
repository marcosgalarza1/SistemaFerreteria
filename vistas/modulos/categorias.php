<?php

if ($_SESSION["perfil"] == "Vendedor") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="content-wrapper text-uppercase ">

  <section class="content-header">



    <h1 style="font-family: Arial, sans-serif; font-weight: bold;">
      Administrar categorías

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar categorías</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">



      <div class="box-header with-border">


        <button class="btn btn-warning" data-toggle="modal" data-target="#modalAgregarCategoria">


          Agregar categoría

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive table-condensed table-hover tablascategoria" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Categoria</th>
              <th>Fecha</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->


        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">


                <span class="input-group-addon">

                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB3UlEQVR4nO2WzS4EQRCAB5FwEH9Z3dVW9uA3SBwEsXHg6kT8hDsbN97Ac3gADmw8gWSZ7p4gEi9gvYPfrOlOSnpjx1gzszMhXLaS71TJfFu91V1lWfX4r0DBhg2BuQOrGW2aei6kaDVPZz0EC5mW5MJjq0kLeqoFYBkOeUSrsZI3H1aCrmgbNkORbKMkYSSRWHO65kk/UJKuVvJK0MVIqU+eqHLNYa9arDns+sTR1frA20xHbDE66QHF6atXLacvKFL9lbzrkOk4UnMyuP/5F8UK1yHTStBDgyvp1JcfhlYjcjKmOJlHQRYC4TCJTro1kbQefxpYyHRoDjkD3nS2f8vbNIUSRko2HY2k/Ah1t8WWKgH3XlcLKPrl5mNxr1MZTtYfrlh3TbEWdCfgHucqecVhOZHYhk33gmVriznkvokFbHliCUtJxSjYbNyjLn4+IHDnP2q8YkNJjxqddFdNsQkj0gK2DWHN9SbJOF72TkRhBkXs5qrHn4Zrkxkl6JHBDIzqRaHmkAjBlSwbeqfxvHewaiy+mlHp5WOOxcguFwEN95uLQBiloF3u11afqAflmvUFL3sc8r5qT/zLHkrS85OqXQ5ziFZDaIOhzYYMgbkDq/kxZL2Nov6Y/Gu8A5qd86zvG5BxAAAAAElFTkSuQmCC">

                </span>
                <input type="text" class="form-control input-lg" name="nuevaCategoria" id="nuevaCategoria"
                  placeholder="Ingresar categoria" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <div class="boton">

            <button type="button" class="btn btn-default " data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn "> Guardar categoria</button>
          </div>



        </div>

        <?php

        $crearCategoria = new ControladorCategorias();
        $crearCategoria->ctrCrearCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CATEGORÍA
======================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar categoría</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon">

                  <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB3UlEQVR4nO2WzS4EQRCAB5FwEH9Z3dVW9uA3SBwEsXHg6kT8hDsbN97Ac3gADmw8gWSZ7p4gEi9gvYPfrOlOSnpjx1gzszMhXLaS71TJfFu91V1lWfX4r0DBhg2BuQOrGW2aei6kaDVPZz0EC5mW5MJjq0kLeqoFYBkOeUSrsZI3H1aCrmgbNkORbKMkYSSRWHO65kk/UJKuVvJK0MVIqU+eqHLNYa9arDns+sTR1frA20xHbDE66QHF6atXLacvKFL9lbzrkOk4UnMyuP/5F8UK1yHTStBDgyvp1JcfhlYjcjKmOJlHQRYC4TCJTro1kbQefxpYyHRoDjkD3nS2f8vbNIUSRko2HY2k/Ah1t8WWKgH3XlcLKPrl5mNxr1MZTtYfrlh3TbEWdCfgHucqecVhOZHYhk33gmVriznkvokFbHliCUtJxSjYbNyjLn4+IHDnP2q8YkNJjxqddFdNsQkj0gK2DWHN9SbJOF72TkRhBkXs5qrHn4Zrkxkl6JHBDIzqRaHmkAjBlSwbeqfxvHewaiy+mlHp5WOOxcguFwEN95uLQBiloF3u11afqAflmvUFL3sc8r5qT/zLHkrS85OqXQ5ziFZDaIOhzYYMgbkDq/kxZL2Nov6Y/Gu8A5qd86zvG5BxAAAAAElFTkSuQmCC">

                </span>

                <input type="text" class="form-control input-lg" name="editarCategoria" id="editarCategoria" required>

                <input type="hidden" name="idCategoria" id="idCategoria" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <div class="boton">

            <button type="button" class="btn btn-default " data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-">Guardar cambios</button>

          </div>



        </div>

        <?php

        $editarCategoria = new ControladorCategorias();
        $editarCategoria->ctrEditarCategoria();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarCategoria = new ControladorCategorias();
$borrarCategoria->ctrBorrarCategoria();

?>