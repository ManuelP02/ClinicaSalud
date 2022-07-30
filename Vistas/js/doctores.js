$(".DT").on("click", ".EditarDoctor", function(){

	var Did = $(this).attr("Did");
	var datos = new FormData();

	datos.append("Did", Did);

	$.ajax({

		url: "Ajax/doctoresA.php",
		method: "POST",
		data: datos,
		dataType: "json",
		contentType: false,
		cache: false,
		processData: false,

		success: function(resultado){

			$("#Did").val(resultado["id"]);
			$("#apellidoE").val(resultado["apellido"]);
			$("#nombreE").val(resultado["nombre"]);
			$("#usuarioE").val(resultado["usuario"]);
			$("#claveE").val(resultado["clave"]);

			$("#sexoE").html(resultado["sexo"]);
			$("#sexoE").val(resultado["sexo"]);

		} 

	})

})


let Did = '';
let imgD = '';

function createModal(){

const div = document.createElement("div");

const modal = `<div id="EliminarDoctor" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h3 class="modal-title">¡Cuidado!</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar un doctor</h4></center>
      </div>
      <div class="modal-body">
        <center><label style="font-size: 25px">¿Desea eliminar doctor?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarDoctor"><strong>Eliminar</strong></button>
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

	Did = $(this).attr("Did");
	imgD = $(this).attr("imgD");
})



$("#EliminarDoctor").on("click", ".EliminarDoctor", function(e){

window.location = "index.php?url=doctores&Did="+Did+"&imgD="+imgD;

})





// $(".DT").on("click", ".EliminarDoctor", function(){
// 	var Did = $(this).attr("Did");
// 	var imgD = $(this).attr("imgD");

// 	window.location = "index.php?url=doctores&Did="+Did+"&imgD="+imgD;
// })


$(".DT").DataTable({

	"language": {

		"sSearch": "Buscar:",
		"sEmptyTable": "No hay datos en la Tabla",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
		"SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
		"oPaginate": {

			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"

		},

		"sLoadingRecords": "Cargando...",
		"sLengthMenu": "Mostrar _MENU_ registros"
	

	}

})