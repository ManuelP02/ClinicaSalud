<?php

if($_SESSION["id"] != substr($_GET["url"], 16)){

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
	if($_SESSION["sexo"] == "Masculino"){
		echo'<center><h2>Pacientes atendidos por Dr '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</h2>
		    <a href="http://localhost/clinica/inicio">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>

    </center>
		';
	}
	else{
		echo'<center><h2>Pacientes atendidos por Dra '.$_SESSION["nombre"].' '.$_SESSION["apellido"].'</h2>
		    <a href="http://localhost/clinica/inicio">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>

    </center>
		';
	}
	?>
		
</section> 
<section class="content">
	
	<div class="box">
		


		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">

				<thead>
						
					<tr>
					
						<th>Año, mes, día y hora</th>
						<th>Paciente</th>
						<th>Documento</th>
					</tr>

				</thead>
				<tbody>

					<?php

					$resultado = CitasC::VerCitas();

					foreach ($resultado as $key => $value) {
					
					if($_SESSION["id"] == $value["id_doctor"]){

						echo '

						<tr>
						
						<td>'.$value["inicio"].'</td>';

						$columna = "documento";
						$valor = $value["documento"];
						$paciente = PacientesC::VerPacientesC($columna, $valor);
						echo'<td>'.$paciente["nombre"].' '.$paciente["Apaterno"].'</td>';


						$columna = "documento";
						$valor = $value["documento"];
						$documento = PacientesC::VerPacientesC($columna, $valor);
						echo'<td>'.$documento["documento"].'</td>';


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
 

