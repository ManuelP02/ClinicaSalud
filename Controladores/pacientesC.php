<?php 

class PacientesC{


		//Crear pacientes
	public function CrearPacienteC(){

		if(isset($_POST["rolP"])){

			$tablaBD = "pacientes";

					$datosC = array("Apaterno"=>$_POST["Apaterno"], "Amaterno"=>$_POST["Amaterno"], "nombre"=>$_POST["nombre"], "fecha"=>$_POST["fecha"], "sexo"=>$_POST["sexo"], "documento"=>$_POST["documento"], "usuario"=>$_POST["usuario"], "clave"=>$_POST["clave"], "rol"=>$_POST["rolP"]);

			$resultado = PacientesM::CrearPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "pacientes";

				</script>';


			}



		}


	}


	///Ver pacientes

	static public function VerPacientesC($columna, $valor){

		$tablaBD = "pacientes";

		$resultado = PacientesM::VerPacientesM($tablaBD, $columna, $valor);

		return $resultado;



	}

		static public function VerPacientesNC($tablaBD, $idpaciente){

		$tablaBD = "pacientes";

		$resultado = PacientesM::VerPacientesNM($tablaBD, $idpaciente);

		return $resultado;

	}

	

	//Borrar pacientes

	public function BorrarPacienteC(){


		if(isset($_GET["Pid"])){

			$tablaBD = "pacientes";

			$id = $_GET["Pid"];

			if($_GET["imgP"] != ""){

				unlink($_GET["imgP"]);
			}

			$resultado = PacientesM::BorrarPacienteM($tablaBD, $id);


			if($resultado == true){

				echo '<script>

				window.location = "pacientes";

				</script>';


			}

		}


	}


	///Actualizar paciente

	public function ActualizarPacienteC(){

		if(isset($_POST["Pid"])){

			$tablaBD = "pacientes";
			$datosC = array("idpaciente"=>$_POST["Pid"], "Apaterno"=>$_POST["ApaternoE"], "Amaterno"=>$_POST["AmaternoE"], "nombre"=>$_POST["nombreE"], "fecha"=>$_POST["fechaE"], "sexo"=>$_POST["sexoE"], "documento"=>$_POST["documentoE"], "usuario"=>$_POST["usuarioE"], "clave"=>$_POST["claveE"]);

			$resultado = PacientesM::ActualizarPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "pacientes";

				</script>';


			}



		}


	}

		///Inicio de sesion pacientes

	public function IngresarPacienteC(){

		if(isset($_POST["usuario-Ing"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["clave-Ing"])){

				$tablaBD = "pacientes";
				$datosC = array("usuario"=>$_POST["usuario-Ing"], "clave"=>$_POST["clave-Ing"]);

				$resultado = PacientesM::IngresarPacienteM($tablaBD, $datosC);

			if($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]){
					$_SESSION["Ingresar"] = true;
					$_SESSION["idpaciente"] = $resultado["idpaciente"];
					$_SESSION["Apaterno"] = $resultado["Apaterno"];
					$_SESSION["Amaterno"] = $resultado["Amaterno"];
					$_SESSION["nombre"] = $resultado["nombre"];
					$_SESSION["foto"] = $resultado["foto"];
					$_SESSION["documento"] = $resultado["documento"];
					$_SESSION["usuario"] = $resultado["usuario"];
					$_SESSION["clave"] = $resultado["clave"];
					$_SESSION["rol"] = $resultado["rol"];

					echo'<script>

					window.location = "inicio";

					</script>';



				}else {
					echo '<br><div class="alert alert-danger"> Usuario o contraseña incorrectos </div>';
				}


			}


		}


	}



	///Ver perfil paciente

	public function VerPerfilPacienteC(){

		$tablaBD = "pacientes";
		$idpaciente = $_SESSION["idpaciente"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $idpaciente);

		echo'

				<tr>
								
								<td>'.$resultado["Apaterno"].'</td>
								<td>'.$resultado["Amaterno"].'</td>
								<td>'.$resultado["nombre"].'</td>
								<td>'.$resultado["sexo"].'</td>';
								if($resultado["foto"] == ""){


								echo '<td><img src="Vistas/img/defecto.png" width="40px"></td>';
							}else{

								echo '<td><img src="'.$resultado["foto"].'" width="40px"></td>';

							}
								echo'
								<td>'.$resultado["documento"].'</td>
								<td>'.$resultado["usuario"].'</td>
								<td>'.$resultado["clave"].'</td>
								<td>
								
								<a href="http://localhost/clinica/perfil-P/'.$resultado["idpaciente"].'"> 

									<button class="btn btn-success"><i class="fa fa-pencil"></i></button>
								</a>	

								</td>



							</tr>';


	}


	///Editar perfil paciente

	public function EditarPerfilPacienteC(){

		$tablaBD = "pacientes";

		$idpaciente = $_SESSION["idpaciente"];

		$resultado = PacientesM::VerPerfilPacienteM($tablaBD, $idpaciente);

		echo '<form method="POST" enctype="multipart/form-data">
					
						<div class="row">
							<div class="col-md-6 col-xs-12">

						<h2>Apellido paterno:*</h2>
						<input type="text" class="input-lg" name="apaternoPerfil" value="'.$resultado["Apaterno"].'">
						<input type="hidden" class="input-lg" name="PacienteId" value="'.$resultado["idpaciente"].'">

						<h2>Apellido materno:*</h2>
						<input type="text" class="input-lg" name="amaternoPerfil" value="'.$resultado["Amaterno"].'">

						<h2>Nombre:*</h2>
						<input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">


						<h2>Documento:</h2><small>Debe ser editado por una secretaria o doctor</small><br>

						<input type="text" disabled class="input-lg" name="documentoPerfil" value="'.$resultado["documento"].'">
						<h2>Usuario:</h2>
						<input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">
						<h2>Clave</h2>
						<input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">

							</div>

							<div class="col-md-6 col-xs-12">
								
								<br><br>

								<input type="file" name="imgPerfil">	

								<br>';

								if($resultado["foto"] != ""){

										echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px" class="img-responsive">';
								}else{

									echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px" class="img-responsive">';

								}


								echo'<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

								<br><br><br><br><br><br>

								<button type="submit" class="btn btn-success btn-lg">Guardar cambios</button>


							</div>



						</div>


				</form>';


	}


	///Actualizar perfil paciente

	public function ActualizarPerfilPacienteC(){

		if(isset($_POST["PacienteId"])){

			$rutaImg = $_POST["imgActual"];

			if(isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])){

				if(!empty($_POST["imgActual"])){

					unlink($_POST["imgActual"]);

				}

				if($_FILES["imgPerfil"]["type"] == "image/png"){

					$nombre = mt_rand(100, 999);
					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".png";
					$foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);
					imagepng($foto, $rutaImg);

				}

				if($_FILES["imgPerfil"]["type"] == "image/jpeg"){

					$nombre = mt_rand(100, 999);
					$rutaImg = "Vistas/img/Pacientes/Paciente".$nombre.".jpg";
					$foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);
					imagejpeg($foto, $rutaImg);

				}

			}

			$tablaBD = "pacientes";

			$datosC = array("idpaciente"=>$_POST["PacienteId"], "Apaterno"=>$_POST["apaternoPerfil"], "Amaterno"=>$_POST["amaternoPerfil"], "nombre"=>$_POST["nombrePerfil"], "usuario"=>$_POST["usuarioPerfil"], "clave"=>$_POST["clavePerfil"], "foto"=>$rutaImg);

			$resultado = PacientesM::ActualizarPerfilPacienteM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/clinica/perfil-P/'.$_SESSION["idpaciente"].'";

				</script>';

			}





		}



	}




}



?>