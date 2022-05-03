function buscarPaciente()
{
	var documento=$("#documento").val();
	$.post("../Ajax/pacientesA.php?op=buscar",{documento : documento}, function(data, status)
	{
		$("#idpaciente").val('');
		$("#paciente").val('');

		if (data==null){
			//mostrarform(true);
			$("#idpaciente").val('');
			$("#paciente").val('No existe el paciente');
		}
		else
		{
			data = JSON.parse(data);		
			//mostrarform(true);
			$("#idpaciente").val(data.idpersona);
			$("#paciente").val(data.apaterno + ' ' +data.amaterno + ' ' + data.nombre);
		}
		
 	})
}
$(".DT").on("click", ".BorrarReceta", function(){

	var Rid = $(this).attr("Rid");

	window.location = "index.php?url=Recetas&Rid="+Rid;





})