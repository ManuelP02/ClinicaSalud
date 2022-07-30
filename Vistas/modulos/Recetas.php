<?php

if($_SESSION["rol"] != "Doctor" && $_SESSION["rol"] != "Paciente"){

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
if($_SESSION["rol"] == "Doctor"){
$tablaBD = "pacientes";
$idpaciente = substr($_GET["url"], 8);
$resultado = PacientesC::VerPacientesNC($tablaBD, $idpaciente);
echo'<center><h2>Recetas de '.$resultado["nombre"].' '.$resultado["Apaterno"].' '.$resultado["Amaterno"].'</h2>
<label>Cédula: '.$resultado["documento"].'</label><br>
<label>Sexo: '.$resultado["sexo"].'</label><br>
<label>Fecha de nacimiento: '.$resultado["fecha"].'</label><br>
  <a href="http://localhost/clinica/atencion">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
           
</center>

            
';
}
?>

<?php
  if($_SESSION["rol"] == "Paciente"){
    echo'
    <center>
    <h2>Sus Recetas '.$_SESSION["nombre"].' '.$_SESSION["Apaterno"].' '.$_SESSION["Amaterno"].'</h2>
    <a href="http://localhost/clinica/atencion">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>

    </center>';
  }



?>
</section> 
<section class="content">
  
  <div class="box">
    
    <div class="box-header">

   

    </div>
    <div class="box-body">

      <table class="table table-bordered table-hover table-striped DT">

        <thead>
            
          <tr>
            <th>N°</th>
            <th>Opciones</th>
            <th>Servicio & Costo</th>
            <th>Motivo de la consulta</th>
            <th>Medicación</th>
            <th>Dósis</th>
            <th>Duración</th>
            <th>Pago</th>
            <th>Plan</th>
            <th>Fecha de creación</th>
          </tr>

        </thead>
        <tbody>

          <?php 

            $columna = null;
            $valor = null;

            $resultado = AtencionesC::VerRecetasC($columna, $valor);



            foreach ($resultado as $key => $value) {
              echo'<tr><td>'.($key+1).'</td>';
              if($_SESSION["rol"] == "Paciente"){

                echo'
                 <td>
                 <div class="btn-group">
                 <a href="http://localhost/clinica/VerReceta/'.$value["idreceta"].'">
            <button class="btn btn-info" name="btnEnviar">Ver Receta</button></a>
            </div>  ';

              }

            if($_SESSION["rol"] == "Doctor"){
              echo'
              <td><div class="btn-group">
              <a href="http://localhost/clinica/GestRecet/'.$value["idreceta"].'">
            <button class="btn btn-success" name="btnEnviar">Gestionar receta</button></a></div>
             <br>
             <br>
            </td>';

            }

                 
            $columna = "idservicio";
            $valor = $value["idservicio"];

            $servicio = ServiciosC::VerServiciosC($columna, $valor);

            echo '<td>'.$servicio["nombre"].' - '.$servicio["costo"].' DOP</td>';
                echo'
                <td>'.$value["motivo"].'</td>
                <td>'.$value["medicamento"].'</td>
                <td>'.$value["dosis"].'</td>
                <td>'.$value["duracion"].'</td>
                <td>'.$value["pago"].'</td>
                <td>'.$value["plan"].'</td>
                <td>'.$value["fecha"].'</td>
               </tr> ';

                
}

              // $borrarR = new AtencionesC();
              // $borrarR -> BorrarRecetaC();