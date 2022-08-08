<?php

if($_SESSION["rol"] != "Administrador"){

	echo '
	<script>
	window.location = "inicio";
 	</script>';
 	return;

}
?>

<div class="content-wrapper">

<section class="content-header">
		<h1>Gestor de secretarias</h1>
</section> 
<section class="content">
	
	<div class="box">
		
		<div class="box-header">
			
		<center><button class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#CrearSecretaria">Crear Secretaria</button>
</center>
		</div>

		<div class="box-body">
			
			<table class="table table-bordered table-hover table-striped DT">

				<thead>
						
					<tr>
						
						<th>N°</th>
						<th>Apellido</th>
						<th>Nombre</th>
						<th>Foto</th>
						<th>Usuario</th>
						<th>Contraseña</th>
						<th>Opciones</th>
					</tr>

				</thead>
				<tbody>

					<?php 

					$columna = null;

					$valor = null;

					$resultado = SecretariasC::VerSecC($columna, $valor);

					foreach ($resultado as $key => $value) {
					
						echo'

						 <tr>
						
						<td>'.($key+1).'</td>

						<td>'.$value["apellido"].'</td>

						<td>'.$value["nombre"].'</td>';

						if($value["foto"] == ""){


							echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';


						}else{

							echo'<td><img src="'.$value["foto"].'" width="40px"></td>';

						}
					
						echo'<td>'.$value["usuario"].'</td>

						<td>'.$value["clave"].'</td>

						<td>
						<div class="btn-group">
				<button class="btn btn-success EditarSecretaria" Sid="'.$value["id"].'"data-toggle="modal" data-target="#EditarSecretaria">Editar</button></div>

							<div class="btn-group">
			<button id="datos" data-toggle="modal" data-target="#EliminarSecretaria" class="btn btn-danger" Sid="'.$value["id"].'" imgS="'.$value["foto"].'">Borrar</button>
							</div>

						</td>

					</tr>

						';


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

<div class="modal fade" rol="dialog" id="CrearSecretaria">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="POST" role="form">

				<div class="modal-body">
					
					<div class="box-body">
						 <center><h1 class="modal-title"><strong>Crear secretaria</strong></h1></center>
						<div class="form-group">
							<center><small>Los campos marcados con (*) son obligatorios para crear la secretaria</small></center>
							<h2>Apellido:(*)</h2>

							<input type="text" class="form-control input-lg" id="apellido" name="apellido" required oninvalid="this.setCustomValidity('Ingrese el apellido')"
    				oninput="this.setCustomValidity('')">
							<input type="hidden" name="rolS" value="Secretaria"required>

						</div>

						<div class="form-group">
							
							<h2>Nombre:(*)</h2>

							<input type="text" class="form-control input-lg" id="nombre" name="nombre" required
							oninvalid="this.setCustomValidity('Ingrese el nombre')"
    				oninput="this.setCustomValidity('')"
							>

						</div>


						<div class="form-group">
							
							<h2>Usuario:(*)</h2>

							<input type="text" class="form-control input-lg" id="usuario" minlength="4" name="usuario" required oninvalid="this.setCustomValidity('Ingrese el usuario (mínimo 4 carácteres)')"
    				oninput="this.setCustomValidity('')">

						</div>
						<div class="form-group">
							
							<h2>Contraseña:(*)</h2>

							<input type="text" class="form-control input-lg" id="clave" minlength="4" name="clave" required
							oninvalid="this.setCustomValidity('Ingrese la contraseña (mínimo 4 carácteres)')"
    				oninput="this.setCustomValidity('')"
							>

						</div>


					</div>

				</div>
				
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Crear</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

				<?php 

				$crear = new SecretariasC();
				$crear -> CrearSecretariaC();



				?>

			</form>

		</div>

	</div>


</div>

<div class="modal fade" rol="dialog" id="EditarSecretaria">
	
	<div class="modal-dialog">
		
		<div class="modal-content">
			
			<form method="post" role="form">
				
				<div class="modal-body">
					<div class="box-body">
						 <center><h1 class="modal-title"><strong>Editar secretaria</strong></h1></center>
						<div class="form-group">
							<center><small>Los campos marcados con (*) son obligatorios para editar la secretaria</small></center>
							<h2>Apellido:(*)</h2>

							<input type="text" class="form-control input-lg" id="apellidoE" name="apellidoE" required oninvalid="this.setCustomValidity('Ingrese el apellido')"
    				oninput="this.setCustomValidity('')">

							<input type="hidden" id="Sid" name="Sid">

						</div>

						<div class="form-group">
							
							<h2>Nombre:(*)</h2>

							<input type="text" class="form-control input-lg" id="nombreE" name="nombreE" required oninvalid="this.setCustomValidity('Ingrese el nombre')"
    				oninput="this.setCustomValidity('')">

						</div>


						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" minlength="4" id="usuarioE" name="usuarioE" required oninvalid="this.setCustomValidity('Ingrese el usuario (mínimo 4 carácteres)')"
    				oninput="this.setCustomValidity('')">

						</div>

						<div class="form-group">
							
							<h2>Contraseña:(*)</h2>

							<input type="text" class="form-control input-lg" minlength="4" id="claveE" name="claveE" required oninvalid="this.setCustomValidity('Ingrese la contraseña (mínimo 4 carácteres)')"
    				oninput="this.setCustomValidity('')">

						</div>

					</div>

				</div>


				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Guardar Cambios</button>

					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

				</div>

			<?php

				$actualizar = new SecretariasC();
				$actualizar -> ActualizarSecretariaC();

				?>

			</form>

		</div>

	</div>

</div>

<?php 
$borrarD = new SecretariasC();
$borrarD -> BorrarSecretariaC();

?>