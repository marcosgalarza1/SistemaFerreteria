<div class="content-wrapper text-uppercase">

  <section class="content-header">
    <h1>Reportes Compras</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar compra</li>
    </ol>
  </section>

  <section class="content">

    <div class="box">
      <div class="box-body">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title" style="text-align: center;">Filtrar Reporte</h3>
          </div>
          <div class="panel-body">
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id"]; ?>">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label><i class="text-danger">*</i> Fecha de inicio:</label>
                  <div class="input-group">
                    <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo date('Y-m-01'); ?>" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label><i class="text-danger">*</i> Fecha de fin:</label>
                  <div class="input-group">
                    <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo date('Y-m-t'); ?>" class="form-control" required>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label><i class="text-danger">*</i> Proveedor:</label>
                  <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                    <option value="0">Todos</option>
                    <?php
                    $item = null;
                    $valor = null;
                    $proveedores = ControladorProveedors::ctrMostrarProveedors($item, $valor);
                    foreach ($proveedores as $key => $value) {
                      echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="text-right">
              <button type="button" class="btn btn-primary" onclick="generatePDF()">
                <i class="fa fa-print"></i> Generar PDF
              </button>
            </div>

          </div>

          <img src="vistas/img/plantilla/reporte4.png" class="responsive-image" style="display: block; margin: 0 auto; max-width: 100%; height: auto; object-fit: contain;">

          <br>
        </div>
      </div>
    </div>

  </section>

</div>

<script>
  var popupWindow = null;

  function generatePDF() {
    const fechaInicio = document.getElementById('fecha_inicio').value;
    const fechaFin = document.getElementById('fecha_fin').value;
    const idProveedor = document.getElementById('id_proveedor').value;
    const idUsuario = document.getElementById('id_usuario').value;

    const fechaInicioObj = new Date(fechaInicio);
    const fechaFinObj = new Date(fechaFin);

    if (fechaInicioObj > fechaFinObj) {
      swal({
        icon: 'warning',
        title: 'Advertencia',
        text: 'Por favor, seleccione una fecha de inicio menor a la fecha fin.',
      });
      return;
    }

    const width = 800;
    const height = 600;
    const left = (screen.width / 2) - (width / 2);
    const top = (screen.height / 2) - (height / 2);
    const windowFeatures = `menubar=no,toolbar=no,status=no,width=${width},height=${height},left=${left},top=${top}`;

    if (popupWindow && !popupWindow.closed) {
      popupWindow.close();
    }

    popupWindow = window.open(
      "extensiones/tcpdf/pdf/reporte-compras.php?fechaInicio=" + encodeURIComponent(fechaInicio) +
      "&fechaFin=" + encodeURIComponent(fechaFin) +
      "&idProveedor=" + encodeURIComponent(idProveedor) +
      "&idUsuario=" + encodeURIComponent(idUsuario),
      "_blank",
      windowFeatures
    );
  }
</script>