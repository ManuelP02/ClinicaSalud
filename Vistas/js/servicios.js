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


$(".DT").on("click", ".EditarServicio", function(){

	var Sid = $(this).attr("Sid");
	var datos = new FormData();

	datos.append("Sid", Sid);

	$.ajax({

		url: "Ajax/serviciosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){

			$("#Sid").val(resultado["idservicio"]);
			$("#servicioE").val(resultado["nombre"]);
			$("#costoservicioE").val(resultado["costo"]);
			$("#idconsultorio").val(resultado["idconsultorio"]);

		}


	})



})

$("#servicioE").change(function(){
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

				$("#servicioE").parent().after('<center><div class="alert alert-danger"><strong style="font-size: 15px;"><p>¡Ups! :( <br>El nombre de servicio ya existe intenta con otro</p></strong></div></center>');

				$("#servicioE").val("");


			}


		}


	})


})
