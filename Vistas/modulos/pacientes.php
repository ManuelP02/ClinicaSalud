<?php

if($_SESSION["rol"] != "Secretaria" && $_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Administrador"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">

<section class="content-header">
		<h1>Lista de pacientes</h1>
</section> 
<section class="content">
	<div class="box">
		
		<div class="box-header">
			<center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPaciente">Crear Paciente</button></center>

		</div>

		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">


				<thead>
						
					<tr>
						
				
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>Nombre</th>
						<th>Fecha de nacimiento</th>
						<th>Sexo</th>
						<th>Foto</th>
						<th>Numero documento</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Opciones</th>
					</tr>

				</thead>
				<tbody>

					



						<?php 

						$columna = null;
						$valor = null;

						$resultado = PacientesC::VerPacientesC($columna, $valor);

						foreach ($resultado as $key => $value) {
							echo'

							<tr>
						


							<td>'.$value["Apaterno"].'</td>

						<td>'.$value["Amaterno"].'</td>
						<td>'.$value["nombre"].'</td>

						<td>'.$value["fecha"].'</td>

						<td>'.$value["sexo"].'</td>';

						if($value["foto"] == ""){

							echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';


						}else{

							echo'<td><img src="'.$value["foto"].'" width="40px"></td>';	
						}

						echo'<td>'.$value["documento"].'</td>

						<td>'.$value["usuario"].'</td>
						<td>'.$value["clave"].'</td>


						<td>
							<div class="btn-group">
				<button class="btn btn-success EditarPaciente" data-toggle="modal" Pid="'.$value["idpaciente"].'" data-target="#EditarPaciente">Editar</button></div>
					<div class="btn-group">
					<button id="datos" data-toggle="modal" data-target="#EliminarPaciente" class="btn btn-danger"  Pid="'.$value["idpaciente"].'" imgP="'.$value["foto"].'">Borrar</button></i>
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


<div class="modal fade" rol="dialog" id="CrearPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">

				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido Paterno:</h2>

							<input type="text" class="form-control input-lg" name="Apaterno" id="Apaterno" required>

							<input type="hidden" name="rolP" value="Paciente"required>

						</div>
						<div class="form-group">
							
							<h2>Apellido materno:</h2>

							<input type="text" class="form-control input-lg" name="Amaterno" id="Amaterno" required>

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" id="nombre" required>

						</div>

						<div class="form-group">
							
							<h2>Fecha de nacimiento:</h2>

							<input type="date" class="form-control input-lg" name="fecha" id="fecha" required>

						</div>


						<div class="form-group">
							<h2>Sexo</h2>
						<select class="form-control input-lg" name="sexo" id="sexo">
							
								<option>Seleccionar...</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>

							</select>
						</div>

						<div class="form-group">
							
							<h2>Documento:</h2>
							<small>Cédula o pasaporte</small>

							<input type="text" style="text-transform:uppercase"  class="form-control input-lg" name="documento" id="documento" minlength="9"  required>

						</div>



						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" name="usuario" id="usuario" required>

						</div>
						<div class="form-group">
							
							<h2>Contraseña:</h2>

							<input type="text" class="form-control input-lg" name="clave" id="clave" required>

						</div>


					</div>

				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crear = new PacientesC();
				$crear -> CrearPacienteC();



				?>

			</form>

		</div>

	</div>


</div>


<div class="modal fade" rol="dialog" id="EditarPaciente">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">

				<div class="modal-body">
					
					<div class="box-body">
						
						<div class="form-group">
							
							<h2>Apellido Paterno:</h2>

				<input type="text" class="form-control input-lg" id="ApaternoE" name="ApaternoE" required>
							<input type="hidden" id="Pid" name="Pid">

						</div>
						<div class="form-group">
							
							<h2>Apellido materno:</h2>

							<input type="text" class="form-control input-lg" id="AmaternoE" name="AmaternoE" required>

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

				<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" required>

						</div>

				<div class="form-group">
							
							<h2>Fecha de nacimiento:</h2>

							<input type="date" class="form-control input-lg" name="fechaE" id="fechaE" required>

						</div>

					<div class="form-group">
							<h2>Sexo:</h2>
							<select class="form-control input-lg" name="sexoE" id="sexoE" required="">
								
								<option id="sexoE">Seleccionar...</option>
								<option value="Masculino">Masculino</option>
								<option value="Femenino">Femenino</option>

							</select>


						</div>
						<div class="form-group">
							
							<h2>Documento:</h2>

							<input type="text" class="form-control input-lg" id="documentoE" name="documentoE" required>

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
					<button type="submit" class="btn btn-success">Guardar cambios</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$actualizar = new PacientesC();
				$actualizar -> ActualizarPacienteC();



				?>

			</form>

		</div>

	</div>


</div>
 

<?php 
$borrarD = new PacientesC();
$borrarD -> BorrarPacienteC();

?>