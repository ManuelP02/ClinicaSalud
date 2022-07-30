  <?php

if($_SESSION["rol"] != "Doctor"){

  echo '
  <script>
  window.location = "inicio";
  </script>';
  return;

}
?>

<div class="content-wrapper">

<section class="content-header">
    <center>
     <h2>Pacientes - Historial clínico & recetas</h2>
         <a href="http://localhost/clinica/inicio">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>

    </center>
</section> 
<section class="content">
  
  <div class="box">
    
    <div class="box-header">

   

    </div>
    <div class="box-body">
      <table class="table table-bordered table-hover table-striped DT">

        <thead>
            
          <tr>
            
            <th>Gestionar historial</th>
            <th>Gestionar receta</th>
            <th>Nombre completo</th>
            <th>Cédula</th>
            <th>Sexo</th>
            <th>Foto</th>
            <th>Fecha de nacimiento</th>
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
            
                     <td>  
                  
                <div class="btn-group">
              <a href="http://localhost/clinica/CrearAtencion/'.$value["idpaciente"].'">
            <button class="btn btn-primary" name="btnEnviar">Crear Historial</button></a>

           <a href="http://localhost/clinica/historialclinico/'.$value["idpaciente"].'">
            <button title="Ver historial de '.$value["nombre"].'" class="btn btn-info">Ver Historial</button></a>
              </div>
              
                </td>
                 <div class="btn-group">
                <td><a href="http://localhost/clinica/CrearReceta/'.$value["idpaciente"].'">
              <button class="btn btn-success name="btnEnviar">Crear Receta</button></a>

                 <a href="http://localhost/clinica/Recetas/'.$value["idpaciente"].'">
            <button title="Ver recetas de '.$value["nombre"].'" class="btn btn-info">Ver Recetas</button></a>
            </div>

              </td>
              

          

        
            <td>'.$value["nombre"].' '.$value["Apaterno"].' '.$value["Amaterno"].'</td>

            <td>'.$value["documento"].'</td>

            <td>'.$value["sexo"].'</td>';

            if($value["foto"] == ""){

              echo'<td><img src="Vistas/img/defecto.png" width="40px"></td>';


            }else{

              echo'<td><img src="'.$value["foto"].'" width="40px"></td>'; 
            }

            echo'<td>'.$value["fecha"].'</td>

            





          </tr>

          ';



            }
            

            ?>

 
          

      

     
       

          

   




