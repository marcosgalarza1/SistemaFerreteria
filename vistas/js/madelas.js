/*=============================================
EDITAR MODELO
=============================================*/
$(".tablas").on("click", ".btnEditarMadela", function () {
  var idMadela = $(this).attr("idMadela");

  var datos = new FormData();
  datos.append("idMadela", idMadela);

  $.ajax({
    url: "ajax/madelas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#editarMadela").val(respuesta["madela"]);
      $("#idMadela").val(respuesta["id"]);
    },
  });
});

/*=============================================
ELIMINAR MODELO
=============================================*/
$(".tablas").on("click", ".btnEliminarMadela", function () {
  var idMadela = $(this).attr("idMadela");

  swal({
    title: "¿Está seguro de borrar?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar!",
  }).then(function (result) {
    if (result.value) {
      window.location = "index.php?ruta=madelas&idMadela=" + idMadela;
    }
  });
});

/*=============================================
REVISAR SI EL TIPO DE PRODUCTO  YA ESTÁ REGISTRADO
=============================================*/

$("#nuevaMadela").change(function () {
  $(".alert").remove();

  var madela = $(this).val();

  var datos = new FormData();
  datos.append("validarMadela", madela);

  $.ajax({
    url: "ajax/madelas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta) {
        $("#nuevaMadela")
          .parent()
          .after(
            '<div class="alert alert-danger">Esta tipo de producto ya existe en la base de datos</div>'
          );

        $("#nuevaMadela").val("");
      }
    },
  });
});
