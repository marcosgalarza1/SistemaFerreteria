/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablascliente").on("click", ".btnEditarCliente", function () {
  var idCliente = $(this).attr("idCliente");

  var datos = new FormData();
  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idCliente").val(respuesta["id"]);
      $("#editarCliente").val(respuesta["nombre"]);
      $("#editarDocumentoId").val(respuesta["documento"]);
      $("#editarTelefono").val(respuesta["telefono"]);
      $("#editarDireccion").val(respuesta["direccion"]);
    },
  });
});

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablascliente").on("click", ".btnEliminarCliente", function () {
  var idCliente = $(this).attr("idCliente");

  swal({
    title: "¿Está seguro de borrar al cliente?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, borrar al cliente!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=clientes&idCliente=" + idCliente;
    }
  });
});

/*=============================================
REVISAR SI CLIENTE YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoCliente").change(function () {
  $(".alert").remove();

  var cliente = $(this).val();

  var datos = new FormData();
  datos.append("validarCliente", cliente);

  $.ajax({
    url: "ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#nuevoCliente")
          .parent()
          .after(
            '<div class="alert alert-danger">Este cliente ya existe en la base de datos</div>'
          );

        $("#nuevoCliente").val("");
      }
    },
  });
});
