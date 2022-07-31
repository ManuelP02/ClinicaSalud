$("#consultorioN").change(function(){
var consultorio = $(this).val();
var datos = new FormData();
datos.append("Norepetir", consultorio);

	$.ajax({

		url: "Ajax/consultoriosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){


			if(resultado){

				$("#consultorioN").parent().after('<center><div class="alert alert-danger"><strong style="font-size: 15px;"><p>¡Ups! :( <br>El nombre de consultorio ya existe intenta con otro</p></strong></div></center>');

				$("#consultorioN").val("");


			}


		}


	})


})

$(".DT").on("click", ".EditarConsultorio", function(){

	var Cid = $(this).attr("Cid");
	var datos = new FormData();

	datos.append("Cid", Cid);

	$.ajax({

		url: "Ajax/consultoriosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){

			$("#Cid").val(resultado["idconsultorio"]);
			$("#consultorioE").val(resultado["nombreconsultorio"]);

		}


	})



})


$("#consultorioE").change(function(){
var consultorio = $(this).val();
var datos = new FormData();
datos.append("Norepetir", consultorio);

	$.ajax({

		url: "Ajax/consultoriosA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){


			if(resultado){

				$("#consultorioE").parent().after('<center><div class="alert alert-danger"><strong style="font-size: 15px;"><p>¡Ups! :( <br>El nombre de consultorio ya existe intenta con otro</p></strong></div></center>');

				$("#consultorioE").val("");


			}


		}


	})


})