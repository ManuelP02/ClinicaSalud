let Pid = '';
let imgP = '';

function createModal(){

const div = document.createElement("div");

const modal = `<div id="EliminarPaciente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h2 style="color: red" class="modal-title"><strong>¡CUIDADO!</strong></h2></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar un paciente</h4></center>
      </div>
      <div class="modal-body">
        <center><label style="font-size: 25px">¿Desea eliminar paciente?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarPaciente"><strong>Eliminar</strong></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"">Cancelar</button>
      </div>
    </div>
  </div>
</div>`

div.innerHTML = modal;

document.body.appendChild(div.firstElementChild);

}



createModal();


$(".DT").on("click", "#datos", function(e){

	Pid = $(this).attr("Pid");
	imgP = $(this).attr("imgP");
})



$("#EliminarPaciente").on("click", ".EliminarPaciente", function(e){

window.location = "index.php?url=pacientes&Pid="+Pid+"&imgP="+imgP;

})



// $(".DT").on("click", ".EliminarPaciente", function(){

// 	var Pid = $(this).attr("Pid");
// 	var imgP = $(this).attr("imgP");

// 	window.location = "index.php?url=pacientes&Pid="+Pid+"&imgP="+imgP;

// })



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

				$("#usuarioE").parent().after('<div class="alert alert-danger">El nombre de usuario ya existe</div>');

				$("#usuarioE").val("");


			}


		}


	})

})
$("#documento").change(function(){

	$(".alert").remove();

	var documento = $(this).val();
	var datos = new FormData();

	datos.append("NorepetirD", documento);

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

				$("#documento").parent().after('<div class="alert alert-danger">El documento ya existe</div>');

				$("#documento").val("");


			}


		}


	})

})

$("#documentoE").change(function(){

	$(".alert").remove();

	var documento = $(this).val();
	var datos = new FormData();

	datos.append("NorepetirD", documento);

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

				$("#documentoE").parent().after('<div class="alert alert-danger">El documento ya existe</div>');

				$("#documentoE").val("");


			}


		}


	})

})

