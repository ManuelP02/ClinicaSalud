<?php 
class InicioC{

	public function MostrarInicioC(){

		$tablaBD = "inicio";

		$id = "1";

		$resultado = InicioM::MostrarInicioM($tablaBD, $id);
		if($_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Paciente" && $_SESSION["rol"] != "Secretaria"){

					echo'
		<center><img src="'.$resultado["logo"].'" class="img-responsive"></center> <br>
                  <div class="box">
		                  <div class="box-body">
                        <div class="col-md-12 bg-primary" style="border-radius: 15px;background-image: linear-gradient(to bottom, #3c8dbc,#3c8dbc,#3c8dbc	,#54798d, #54798d);">
                        
                          <h2>¿Quiénes somos?</h2>

                           <h3>'.$resultado["intro"].'</h3>

                           <hr>

                           <h2>Horario:</h2>
                            <h3>'.$resultado["horaE"].' AM</h3>
                             <h3>'.$resultado["horaS"].' PM</h3>
                             <hr>
                             <h2>Dirección:</h2>
                             <h3>'.$resultado["direccion"].'</h3>
                             <hr>
                             <h2>Contactos:</h2>
                             <h3>Teléfono: '.$resultado["telefono"].'</h3>
                              <h3>'.$resultado["correo"].'</h3>
                      </div>';

		}
                      if($_SESSION["rol"] == "Doctor"){
                 	
                      	echo'
		<center><img src="'.$resultado["logo"].'" class="img-responsive"></center> <br>
                  <div class="box">
		                  <div class="box-body">
                        <div class="col-md-6 bg-primary" style="border-radius: 15px;background-image: linear-gradient(to bottom, #3c8dbc,#3c8dbc,#3c8dbc	,#54798d, #54798d);">
                        
                          <h2>¿Quiénes somos?</h2>

                           <h3>'.$resultado["intro"].'</h3>

                           <hr>

                           <h2>Horario:</h2>
                            <h3>'.$resultado["horaE"].' AM</h3>
                             <h3>'.$resultado["horaS"].' PM</h3>
                             <hr>
                             <h2>Dirección:</h2>
                             <h3>'.$resultado["direccion"].'</h3>
                             <hr>
                             <h2>Contactos:</h2>
                             <h3>Teléfono: '.$resultado["telefono"].'</h3>
                              <h3>'.$resultado["correo"].'</h3>
                      </div>';


require "cone.php";
     $pac = "SELECT COUNT(*) idcita FROM citas WHERE id_doctor = '".$_SESSION['id']."'";
$resultpac = $mysqli->query($pac);
$pacientes = $resultpac->fetch_assoc();
                 	                       echo'
                      <div class="col-lg-6 col-xs-6">
<br>
<div class="small-box bg-aqua">
<div class="inner">
<h3>'.$pacientes['idcita'].'</h3>
<h3>Citas generadas<h3>
</div>
<div class="icon">
<i class="ion-medkit"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>';	
require "cone.php";
     $serv = "SELECT COUNT(*) idservicio FROM recetas WHERE id_doctor = '".$_SESSION['id']."'";
$resultserv = $mysqli->query($serv);
$servicios = $resultserv->fetch_assoc();
echo'
<div class="small-box bg-orange">
<div class="inner">
<h3>'.$servicios['idservicio'].'</h3>
<h3>Servicios brindados</h3>
</div>
<div class="icon">
<i class="ion-pricetag"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>';
require "cone.php";
     $cobrado = "SELECT SUM(pago) AS pago FROM recetas WHERE id_doctor = '".$_SESSION['id']."'";
$resultcobr = $mysqli->query($cobrado);
$cobros = $resultcobr->fetch_assoc();
echo'
<br>
<div class="small-box bg-green">
<div class="inner">';
if ($cobros['pago'] < 1){
	echo'<h3>0</h3>
<h3>No han generado ganancias</h3>
</div>
<div class="icon">
<i class="ion-plus	"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
	';
} 
else{
		echo'<h3>'.$cobros['pago'].' DOP</h3>
<h3>Total ganancias</h3>
</div>
<div class="icon">
<i class="ion-plus	"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>';
}




                      	
                     
                       }


  if($_SESSION["rol"] == "Paciente"){
                 	
                      	echo'
		<center><img src="'.$resultado["logo"].'" class="img-responsive"></center> <br>
                  <div class="box">
		                  <div class="box-body">
                        <div class="col-md-6 bg-primary" style="border-radius: 15px;background-image: linear-gradient(to bottom, #3c8dbc,#3c8dbc,#3c8dbc	,#54798d, #54798d);">
                        
                          <h2>¿Quiénes somos?</h2>

                           <h3>'.$resultado["intro"].'</h3>

                           <hr>

                           <h2>Horario:</h2>
                            <h3>'.$resultado["horaE"].' AM</h3>
                             <h3>'.$resultado["horaS"].' PM</h3>
                             <hr>
                             <h2>Dirección:</h2>
                             <h3>'.$resultado["direccion"].'</h3>
                             <hr>
                             <h2>Contactos:</h2>
                             <h3>Teléfono: '.$resultado["telefono"].'</h3>
                              <h3>'.$resultado["correo"].'</h3>
                      </div>';


require "cone.php";
$documento = $_SESSION['documento'];
$consulta = "SELECT * FROM citas WHERE documento = $documento ORDER BY inicio DESC";
$citas = $mysqli->query($consulta);
$pacientes = $citas->fetch_assoc();
                 	                       echo'
                      <div class="col-lg-6 col-xs-6">
<br>
<div class="small-box bg-aqua">
<div class="inner">
<h3>'.$pacientes['inicio'].'</h3>
<h3>Su última cita registrada<h3>
</div>
<div class="icon">
<i class="ion-medkit"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>';

require "cone.php";
$documento = $_SESSION['documento'];
$consulta = "SELECT COUNT(*) idcita FROM citas WHERE documento = $documento ";
$citas = $mysqli->query($consulta);
$pacientes = $citas->fetch_assoc();
echo'
<div class="small-box bg-orange">
<div class="inner">
<h3>'.$pacientes['idcita'].'</h3>
<h3>Todas sus citas<h3>
</div>
<div class="icon">
<i class="ion-asterisk"></i>
</div>
<a href="http://localhost/clinica/Recetas/'.$_SESSION["idpaciente"].'" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>


';	

require "cone.php";
$idpaciente = $_SESSION['idpaciente'];
$consulta = "SELECT COUNT(*) idreceta FROM recetas WHERE idpaciente = $idpaciente ";
$citas = $mysqli->query($consulta);
$pacientes = $citas->fetch_assoc();
echo'
<div class="small-box bg-green">
<div class="inner">
<h3>'.$pacientes['idreceta'].'</h3>
<h3>Recetas generadas<h3>
</div>
<div class="icon">
<i class="ion-briefcase"></i>
</div>
<a href="http://localhost/clinica/Recetas/'.$_SESSION["idpaciente"].'" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>



';

                       }  

        if($_SESSION["rol"] == "Secretaria"){
                 	
                      	echo'
		<center><img src="'.$resultado["logo"].'" class="img-responsive"></center> <br>
                  <div class="box">
		                  <div class="box-body">
                        <div class="col-md-6 bg-primary" style="border-radius: 15px;background-image: linear-gradient(to bottom, #3c8dbc,#3c8dbc,#3c8dbc	,#54798d, #54798d);">
                        
                          <h2>¿Quiénes somos?</h2>

                           <h3>'.$resultado["intro"].'</h3>

                           <hr>

                           <h2>Horario:</h2>
                            <h3>'.$resultado["horaE"].' AM</h3>
                             <h3>'.$resultado["horaS"].' PM</h3>
                             <hr>
                             <h2>Dirección:</h2>
                             <h3>'.$resultado["direccion"].'</h3>
                             <hr>
                             <h2>Contactos:</h2>
                             <h3>Teléfono: '.$resultado["telefono"].'</h3>
                              <h3>'.$resultado["correo"].'</h3>
                      </div>';


require "cone.php";
$consulta = "SELECT COUNT(*) idcita FROM citas";
$citas = $mysqli->query($consulta);
$sec = $citas->fetch_assoc();
                 	                       echo'
                      <div class="col-lg-6 col-xs-6">
<br>
<div class="small-box bg-aqua">
<div class="inner">
<h3>'.$sec['idcita'].'</h3>
<h3>Citas se han generado<h3>
</div>
<div class="icon">
<i class="ion-medkit"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>
';	
require "cone.php";
$consulta = "SELECT COUNT(*) idcita FROM citas WHERE DATE(inicio) = CURDATE()";
$citas = $mysqli->query($consulta);
$sec = $citas->fetch_assoc();

 echo'
                   

<div class="small-box bg-orange">
<div class="inner">
<h3>'.$sec['idcita'].'</h3>
<h3>Citas de hoy<h3>
</div>
<div class="icon">
<i class="ion-asterisk"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>
';	

require "cone.php";
$consulta = "SELECT COUNT(*) idreceta FROM recetas";
$citas = $mysqli->query($consulta);
$sec = $citas->fetch_assoc();

 echo'
                   

<div class="small-box bg-green">
<div class="inner">
<h3>'.$sec['idreceta'].'</h3>
<h3>Recetas se han generado<h3>
</div>
<div class="icon">
<i class="ion-briefcase"></i>
</div>
<a href="#" class="small-box-footer">Más información  <i class="fa fa-arrow-circle-right"></i></a>
</div>
<br>
';	

                       }                 






	}


	///Editar inicio 

		public function EditarInicioC(){

		$tablaBD = "inicio";

		$id = "1";

		$resultado = InicioM::MostrarInicioM($tablaBD, $id);

		$intro = $resultado["intro"];
		echo '<form method="post" enctype="multipart/form-data">
					
				<div class="row">
					
					<div class="col-md-6 col-xs-12">
						
						<h2>Introducción:</h2>
						
						<textarea class="form-control" name="intro" required rows="7">';
						?>
						<?php 

						echo $intro; 
						echo'						
						</textarea>	
						<input type="hidden" class="input-lg" name="Iid" value="'.$resultado["id"].'">

						<div class=form-group>
							<h2>Horario:</h2>
							Desde:<input type="time" class="input-lg" name="horaE" value="'.$resultado["horaE"].'">
							Hasta:<input type="time" class="input-lg" name="horaS" value="'.$resultado["horaS"].'">

						</div>

						<h2>Dirección:</h2>
						<input type="text" class="input-lg" name="direccion" style="width: 530px;" value="'.$resultado["direccion"].'">

						<h2>Teléfono:</h2>
						<input type="text" class="input-lg" name="telefono" value="'.$resultado["telefono"].'">

						<h2>Correo:</h2>
						<input type="text" class="input-lg" name="correo" value="'.$resultado["correo"].'">

					</div>

					<div class="col-md-6 col-xs-12">
						
						<br><br>

						<h2>Logo:</h2>
						<input type="file" name="logo">
						<br>

						<img src="http://localhost/clinica/'.$resultado["logo"].'" width="200px;">


						<input type="hidden" name="logoActual" value="'.$resultado["logo"].'">

						<br><br>


						<h2>Favicon:</h2>
						<input type="file" name="favicon">
						<br>

						<img src="http://localhost/clinica/'.$resultado["favicon"].'" width="200px;">


						<input type="hidden" name="faviconActual" value="'.$resultado["favicon"].'">

						<br><br>

						<button type="submit" class="btn btn-success">Guardar Cambios</button>

					</div>

				</div>

			</form>';

	}


///Actualizar inicio

	public function ActualizarInicioC(){

		if(isset($_POST["Iid"])){

			$rutaLogo = $_POST["logoActual"];

			if(isset($_FILES["logo"]["tmp_name"]) && !empty($_FILES["logo"]["tmp_name"])){

				if(!empty($_POST["logoActual"])){

					unlink($_POST["logoActual"]);

				}

				if($_FILES["logo"]["type"] == "image/jpeg"){

					$rutaLogo = "Vistas/img/logo.jpeg";

					$logo = imagecreatefromjpeg($_FILES["logo"]["tmp_name"]);
					
					imagejpeg($logo, $rutaLogo);

				}

				if($_FILES["logo"]["type"] == "image/png"){

					$rutaLogo = "Vistas/img/logo.png";

					$logo = imagecreatefrompng($_FILES["logo"]["tmp_name"]);
					
					imagepng($logo, $rutaLogo);

				}

			}



			$rutaFavicon = $_POST["faviconActual"];

			if(isset($_FILES["favicon"]["tmp_name"]) && !empty($_FILES["favicon"]["tmp_name"])){

				if(!empty($_POST["faviconActual"])){

					unlink($_POST["faviconActual"]);

				}

				if($_FILES["favicon"]["type"] == "image/jpeg"){

					$rutaFavicon = "Vistas/img/favicon.jpeg";

					$favicon = imagecreatefromjpeg($_FILES["favicon"]["tmp_name"]);
					
					imagejpeg($favicon, $rutaFavicon);

				}

				if($_FILES["favicon"]["type"] == "image/png"){

					$rutaFavicon = "Vistas/img/favicon.png";

					$favicon = imagecreatefrompng($_FILES["favicon"]["tmp_name"]);
					
					imagepng($favicon, $rutaFavicon);

				}

			}


			$tablaBD = "inicio";

			$datosC = array("id"=>$_POST["Iid"], "intro"=>$_POST["intro"], "horaE"=>$_POST["horaE"], "horaS"=>$_POST["horaS"], "telefono"=>$_POST["telefono"], "correo"=>$_POST["correo"], "direccion"=>$_POST["direccion"], "logo"=>$rutaLogo, "favicon"=>$rutaFavicon);

			$resultado = InicioM::ActualizarInicioM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "inicio-editar";
				</script>';

			}


		}

	}


///Favicon controlador 

public function FaviconC(){

	$tablaBD = "inicio";
	$id = "1";

	$resultado = InicioM::MostrarInicioM($tablaBD, $id);

	echo'

	  <link rel="icon" type="" href="'.$resultado["favicon"].'">	';

}




}


?>