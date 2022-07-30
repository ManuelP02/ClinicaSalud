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

					$resultado = SecretariasC::VerSecretariasC();

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
				<button class="btn btn-success EditarSecretaria" data-toggle="modal" Sid="'.$value["id"].'" data-target="#EditarSecretaria">Editar</button></div>
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
						
						<div class="form-group">
							
							<h2>Apellido:</h2>

							<input type="text" class="form-control input-lg" name="apellido" required>
							<input type="hidden" name="rolS" value="Secretaria"required>

						</div>

						<div class="form-group">
							
							<h2>Nombre:</h2>

							<input type="text" class="form-control input-lg" name="nombre" required>

						</div>


						<div class="form-group">
							
							<h2>Usuario:</h2>

							<input type="text" class="form-control input-lg" name="usuario" required>

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

				$crear = new SecretariasC();
				$crear -> CrearSecretariaC();



				?>

			</form>

		</div>

	</div>


</div>


<?php 
$borrarD = new SecretariasC();
$borrarD -> BorrarSecretariaC();

?>