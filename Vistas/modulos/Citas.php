<?php

if($_SESSION["id"] != substr($_GET["url"], 6)){

	echo'
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
	$valor = substr($_GET["url"], 6);

	$resultado = DoctoresC::DoctorC($columna, $valor);

	if($resultado["sexo"] == "Femenino"){

		echo'<center><h2>Doctora: '.$resultado["apellido"].' '.$resultado["nombre"].'</h2>

    </center>';

	}else{

		echo'<center><h2>Doctor: '.$resultado["apellido"].' '.$resultado["nombre"].'</h2>   
    </center>';

	}

	$columna = "idconsultorio";
	$valor = $resultado["idconsultorio"];

	$consultorio = ConsultoriosC::VerConsultoriosC ($columna, $valor);

	echo'
		<h2><center>Consultorio de: '.$consultorio["nombreconsultorio"].'</h2></center>
		<center>
		<a href="http://localhost/clinica/inicio">
		<button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
		</center>';




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
					$valor = substr($_GET["url"], 6);	

					$resultado = DoctoresC::DoctorC($columna, $valor);

					echo'

					<div class="form-group">
				

					<input type="hidden" name="Did" value="'.$resultado["id"].'">
					';


					$columna = "idconsultorio";
					$valor = $resultado["idconsultorio"];

					$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

					echo'<div class="form-group">
					
					<input type="hidden" name="Cid" value="'.$consultorio["idconsultorio"].'">

				</div>	';


					?>

					<div class="form-group">
						
						<h2>Seleccionar paciente:</h2>

						<?php 

						echo'
						<select class="form-control input-lg" name="nombreP">
								
								<option>Seleccionar...</option>';

						$columna = null;
						$valor = null;
						$resultado = PacientesC::VerPacientesC($columna, $valor);

						foreach ($resultado as $key => $value) {
						
							echo'<option value="'.$value["nombre"].' '.$value["Apaterno"].'"> '.$value["nombre"].' '.$value["Apaterno"].' - '.$value["documento"].'</option>';

						}

						?>


						</select>

					</div>

					<div class="form-group">
					<h2>Documento:</h2>
					<input type="text" class="form-control input-lg" name="documentoP" value="">

						


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
				$enviarC -> PedirCitaDoctorC();


				?>


			</form>

		</div>


	</div>

	</div>
