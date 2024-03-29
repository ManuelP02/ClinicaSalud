<?php

if($_SESSION["rol"] != "Paciente"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">

<section class="content-header">



	<?php 

	$columna = "id";
	$valor = substr($_GET["url"], 7);

	$resultado = DoctoresC::DoctorC($columna, $valor);

	if($resultado["sexo"] == "Femenino"){

		echo'<h1>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';

	}else{

		echo'<h1>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h1>';

	}

	$columna = "idconsultorio";
	$valor = $resultado["idconsultorio"];

	$consultorio = ConsultoriosC::VerConsultoriosC ($columna, $valor);

	echo'	<br>
		<h1>Consultorio de: '.$consultorio["nombreconsultorio"].'</h1>
		<small>Para eliminar una cita ya creada, solo haga click sobre ella y confirme.</small>';




	?>
			</section> 
				<section class="content">
	
	<div class="box">
		

		<div class="box-body">

			<div id="calendar"></div>

			
			
		</div>

	</div>

</section>


</div>


<div class="modal fade" rol="dialog" id="CitaModal">

	<div class="modal-dialog">
		
		<div class="modal-content"> 

			<form method="POST">
					
				<div class="modal-body"> 

				<div class="box-body">
					 <center><h1 class="modal-title"><strong>Crear cita</strong></h1></center>

					<?php 


					$columna = "id";
					$valor = substr($_GET["url"], 7);	

					$resultado = DoctoresC::DoctorC($columna, $valor);

					echo'

					<div class="form-group">
					<h2>Nombre del paciente:</h2>
					<input type="text" class="form-control input-lg"name="nyaC" value="'.$_SESSION["nombre"].' '.$_SESSION["Apaterno"].'" readonly>

					<input type="hidden" name="Did" value="'.$resultado["id"].'">

					<input type="hidden" name="Pid" value="'.$_SESSION["idpaciente"].'">

					

				</div>

					<div class="form-group">
					<h2>Documento:</h2>
					<input type="text" class="form-control input-lg"name="documentoC" value="'.$_SESSION["documento"].'" readonly>


				</div>	



					';


					$columna = "idconsultorio";
					$valor = $resultado["idconsultorio"];

					$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

					echo'<div class="form-group">
					
					<input type="hidden" name="Cid" value="'.$consultorio["idconsultorio"].'">

				</div>	';


					?>
						


					<div class="form-group">
					<h2>Fecha:</h2>
					<input type="text" class="form-control input-lg" id="fechaC" value="" readonly>


				</div>	


					<div class="form-group">
					<h2>Hora:</h2>
					<input type="text" class="form-control input-lg" id="horaC"  value="" readonly>


				</div>	

				<div class="form-group">
					<input type="hidden" class="form-control input-lg" name="fyhIC" id="fyhIC" value="" readonly>
					<input type="hidden" class="form-control input-lg" name="fyhFC" id="fyhFC" value="" readonly>


				</div>		


				</div>

				</div>

				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Pedir cita</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>


				<?php 

				$enviarC = new CitasC();
				$enviarC -> EnviarCitaC();


				?>


			</form>

		</div>


	</div>

	</div>
