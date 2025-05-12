/*=============================================
EDITAR MARCA
=============================================*/
$(".tablas").on("click", ".btnEditarMarca", function(){

	var idMarca = $(this).attr("idMarca");

	var datos = new FormData();
	datos.append("idMarca", idMarca);

	$.ajax({
		url: "ajax/marcas.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarMarca").val(respuesta["marca"]);
     		$("#idMarca").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR MARCA
=============================================*/
$(".tablas").on("click", ".btnEliminarMarca", function(){

	 var idMarca = $(this).attr("idMarca");

	 swal({
	 	title: '¿Está seguro de borrar la marca?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar marca!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=marcas&idMarca="+idMarca;

	 	}

	 })

})

/*=============================================
REVISAR SI LA MARCA YA ESTÁ REGISTRADO
=============================================*/

$("#nuevaMarca").change(function () {

	$(".alert").remove();

	var marca = $(this).val();

	var datos = new FormData();
	datos.append("validarMarca", marca);

	$.ajax({
		url: "ajax/marcas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			if (respuesta) {

				$("#nuevaMarca").parent().after('<div class="alert alert-danger">Esta Marca ya existe en la base de datos</div>');

				$("#nuevaMarca").val("");

			}

		}

	})
})