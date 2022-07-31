$(".DT").on("click", ".EditarSecretaria", function(){

	var Sid = $(this).attr("Sid");
	var datos = new FormData();

	datos.append("Sid", Sid);
	$.ajax({

		url: "Ajax/secretariasA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,

		success: function(resultado){

			$("#Sid").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
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

		url: "Ajax/secretariasA.php",
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

		url: "Ajax/secretariasA.php",
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






let Sid = '';
let imgS = '';

function createModal(){

const div = document.createElement("div");

const modal = `<div id="EliminarSecretaria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h2 style="color: red" class="modal-title"><strong>¡CUIDADO!</strong></h2></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar una secretaria</h4></center>
      </div>
      <div class="modal-body">
        <center><label style="font-size: 25px">¿Desea eliminar secretaria?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarSecretaria"><strong>Eliminar</strong></button>
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

	Sid = $(this).attr("Sid");
	imgS = $(this).attr("imgS");
})



$("#EliminarSecretaria").on("click", ".EliminarSecretaria", function(e){

window.location = "index.php?url=secretarias&Sid="+Sid+"&imgS"+imgS;

})




