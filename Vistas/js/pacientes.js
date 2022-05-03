$(".DT").on("click", ".EliminarPaciente", function(){

	var Pid = $(this).attr("Pid");
	var imgP = $(this).attr("imgP");

	window.location = "index.php?url=pacientes&Pid="+Pid+"&imgP="+imgP;

})



$(".DT").on("click", ".EditarPaciente", function(){

	var Pid = $(this).attr("Pid");
	var datos = new FormData();

	datos.append("Pid", Pid);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){

			$("#Pid").val(resultado["idpaciente"]);
			$("#ApaternoE").val(resultado["Apaterno"]);
			$("#AmaternoE").val(resultado["Amaterno"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#fechaE").val(resultado["fecha"]);
			$("#sexoE").val(resultado["sexo"]);
			$("#documentoE").val(resultado["documento"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);




		}


	})



})


$("#usuario").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();

	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){


			if(resultado){

				$("#usuario").parent().after('<div class="alert alert-danger">El nombre de usuario ya existe</div>');

				$("#usuario").val("");


			}


		}


	})




})

$("#usuarioE").change(function(){

	$(".alert").remove();

	var usuario = $(this).val();
	var datos = new FormData();

	datos.append("Norepetir", usuario);

	$.ajax({

		url: "Ajax/pacientesA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false, 
		processData: false,

		success: function(resultado){


			if(resultado){

				$("#usuarioE").parent().after('<div class="alert alert-danger">El usuario ya existe</div>');

				$("#usuarioE").val("");


			}


		}


	})






})