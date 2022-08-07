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

let Cid = '';


function createModal(){

const div = document.createElement("div");

const modal = `<div id="EliminarConsultorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h2 style="color: red" class="modal-title"><strong>¡CUIDADO!</strong></h2></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar un consultorio</h4></center>
      </div>
      <div class="modal-body">
        <center><label style="font-size: 25px">¿Desea eliminar consultorio?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarConsultorio"><strong>Eliminar</strong></button>
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

	Cid = $(this).attr("Cid");
})



$("#EliminarConsultorio").on("click", ".EliminarConsultorio", function(e){

window.location = "index.php?url=consultorios&Cid="+Cid;

})