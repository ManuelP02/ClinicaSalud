let Sid = '';
let imgS = '';

function createModal(){

const div = document.createElement("div");

const modal = `<div id="EliminarSecretaria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <center><h3 class="modal-title">¡Cuidado!</h3></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Estás a punto de eliminar una secretaria</h4></center>
      </div>
      <div class="modal-body">
        <center><label>¿Desea eliminar secretaria?</label></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger EliminarSecretaria">Eliminar</button>
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