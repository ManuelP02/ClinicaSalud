$("#servicioN").change(function(){
var servicio = $(this).val();
var datos = new FormData();
datos.append("Norepetir", servicio);

	$.ajax({

		url: "Ajax/serviciosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){


			if(resultado){

				$("#servicioN").parent().after('<center><div class="alert alert-danger"><strong style="font-size: 15px;"><p>¡Ups! :( <br>El nombre de servicio ya existe intenta con otro</p></strong></div></center>');

				$("#servicioN").val("");


			}


		}


	})


})