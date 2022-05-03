<?php 

if($_SESSION["rol"] != "Doctor"){

	echo '<script>

	window.location = "inicio";

	</script>';

	return;
}

?>

<div class="content-wrapper">
	
	<section class="content-header">
		<?php 
		echo'<h1>Editar perfil</h1>';
		?>

	</section>

	<section class="content">
		
		<div class="box">
			
			<div class="box-body">
				
				<table class="table table-bordered table-hover table-striped">
					
					<thead>
							
					<tr>
						
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Consultorio</th>
						<th>Sexo</th>
						<th>Foto</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Horario</th>
						<th>Editar</th>


					</tr>		


					</thead>

					<tbody>
							<?php


							$perfil = new DoctoresC();
							$perfil -> VerPerfilDoctorC();

							?>





					</tbody>


				</table>


			</div>


		</div>

	</section>


</div>