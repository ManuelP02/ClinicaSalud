<?php

if($_SESSION["idpaciente"] != substr($_GET["url"], 10)){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;


  

}
?>

<div class="content-wrapper">

<section class="content-header">
		<h1>Su historial de citas medicas</h1>
</section> 
<section class="content">
	
	<div class="box">
		


		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">

				<thead>
						
					<tr>
						
						<th>Fecha y hora</th>
						<th>Doctor</th>
						<th>Consultorio</th>
					</tr>

				</thead>
				<tbody>

					<?php

					$resultado = CitasC::VerCitas();

					foreach ($resultado as $key => $value) {
					
					if($_SESSION["documento"] == $value["documento"]){

						echo '

						<tr>

						<td>'.$value["inicio"].'</td>';

						$columna = "id";
						$valor = $value["id_doctor"];
						$doctor = DoctoresC::DoctorC($columna, $valor);
						echo'<td>'.$doctor["apellido"].' '.$doctor["nombre"].'</td>';


						$columna = "idconsultorio";
						$valor = $value["id_consultorio"];
						$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
						echo'<td>'.$consultorio["nombreconsultorio"].'</td>';


					echo'</tr>

						';


					}
					


					}

					

					?> 

					

				</tbody>
			</table>

		</div>

	</div>

</section>


</div>
 -->
