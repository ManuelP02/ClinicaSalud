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




function createModal(){
let Sid = '';

const div = document.createElement("div");

const modal = `<div id="EliminarServicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h2 style="color: red" class="modal-title"><strong>¡CUIDADO!</strong></h2></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar un servicio</h4></center>
      </div>
      <div class="modal-body">
        <center><label style="font-size: 25px">¿Desea eliminar servicio?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarServicio"><strong>Eliminar</strong></button>
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
})



$("#EliminarServicio").on("click", ".EliminarServicio", function(e){

window.location = "index.php?url=servicios&Sid="+Sid;

})
