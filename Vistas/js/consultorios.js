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