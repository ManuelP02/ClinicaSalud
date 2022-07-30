<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Administrador"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">

<section class="content-header">
		<h1>Gestor de doctores</h1>
</section> 
<section class="content">
	
	<div class="box">
		
		<div class="box-header">
			
		<center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button></center>

		</div>

		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">

				<thead>
						
					<tr>
						
						
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Foto</th>
						<th>Consultorio</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Opciones</th>
					</tr>

				</thead>
				<tbody>

					<?php

					$columna = null; 
					$valor = null;

					$resultado = DoctoresC::VerDoctoresC($columna, $valor);

					foreach ($resultado as $key => $value) {
						echo '<tr>
						
						

						<td>'.$value["apellido"].'</td>

						<td>'.$value["nombre"].'</td>';

						if($value["foto"] == ""){

							echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';

						}else{

							echo'<td><img src="'.$value["foto"].'" width="40px"></td>';

						}
						$columna = "idconsultorio";
						$valor = $value["idconsultorio"];

						$consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

						echo '<td>'.$consultorio["nombreconsultorio"].'</td>
						<td>'.$value["usuario"].'</td>
						<td>'.$value["clave"].'</td>




						<td>
							<div class="btn-group">
								<button class="btn btn-success EditarDoctor" Did="'.$value["id"].'" data-toggle="modal" data-target="#EditarDoctor">Editar</button>
									</div>
									<div class="btn-group">	
									<button id="datos" data-toggle="modal" data-target="#EliminarDoctor" class="btn btn-danger" Did="'.$value["id"].'" imgD="'.$value["foto"].'">Borrar</button>
							</div>

						</td>

					</tr>';
					}


					?> 
					

				</tbody>
			</table>

		</div>

	</div>

</section>


</div>
<!-- <script>setTimeout('document.location.reload()',10000); </script>
 -->

<div class="modal fade" rol="dialog" id="CrearDoctor">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">

				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" name="apellido" required>
							<input type="hidden" name="rolD" value="Doctor"required>

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" required>

						</div>


						<div class="form-group">
							<h2>Sexo:</h2>
							<select class="form-control input-lg" name="sexo">
								
								<option>Seleccionar...</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>

							</select>


						</div>

						<div class="form-group">
							<h2>Consultorio:</h2>
							<select class="form-control input-lg" name="consultorio">
								
								<option>Seleccionar...</option>

								<?php 

								$columna = null;
								$valor = null;

								$resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

								foreach ($resultado as $key => $value) {
									echo'<option value="'.$value["idconsultorio"].'">'.$value["nombreconsultorio"].'</option>';
									
								}


								?>

							</select>


						</div>


						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuario" name="usuario" required>

						</div>
						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" name="clave" required>

						</div>


					</div>

				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crear = new DoctoresC();
				$crear -> CrearDoctorC();



				?>

			</form>

		</div>

	</div>


</div>


<div class="modal fade" rol="dialog" id="EditarDoctor">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" id="apellidoE" name="apellidoE" required>

							<input type="hidden" id="Did" name="Did">

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" required>

						</div>


						<div class="form-group">
							
							<h2>Sexo:</h2>

							<select class="form-control input-lg" name="sexoE" required="">
								
								<option id="sexoE"></option>

								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>

							</select>

						</div>

						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" id="usuarioE" name="usuarioE" required>

						</div>

						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" id="claveE" name="claveE" required>

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php

				$actualizar = new DoctoresC();
				$actualizar -> ActualizarDoctorC();

				?>

			</form>

		</div>

	</div>

</div>


<?php 
$borrarD = new DoctoresC();
$borrarD -> BorrarDoctorC();

?>