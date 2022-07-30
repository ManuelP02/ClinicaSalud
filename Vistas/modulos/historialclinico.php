<?php
if($_SESSION["rol"] != "Doctor"){

  echo '
  <script>
  window.location = "inicio";
  </script>';
  return;

}
?>      
      <?php 

        $crear = new AtencionesC();
        $crear -> CrearAtencionC();



        ?> 

             <?php 

        $historial = new AtencionesC();
        $historial -> VerAtencionC();


        ?> 

        <?php 
       $editarA = new AtencionesC();
       $editarA -> ActualizarAtencionC();
       ?>
       <?php 
       $tablaBD = "atencion";

    $id = substr($_GET["url"], 17);

    $resultado = AtencionesM::VerHistorialM($tablaBD, $id);
    $tablaBD = "pacientes";
 $idpaciente = $id;
   $resultad = PacientesC::VerPacientesNC($tablaBD, $idpaciente);

echo'
    <div class="content-wrapper">
   <section class="content-header">
        <center><h2>Historial clínico de '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'</h2>
<label>Cédula: '.$resultad["documento"].'</label><br>
<label>Sexo: '.$resultad["sexo"].'</label><br>
<label>Fecha de nacimiento: '.$resultad["fecha"].'</label><br>
  <a href="http://localhost/clinica/atencion">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
           
</center>
   </section>

   <section class="content">

     <div class="box">';


      echo'<div class="box-body">  
       <form method="post">

        <div class="panel panel-primary">
         <div class="panel-body">

      <label>Antecedentes:</label>
    
    <input type="hidden" class="form-control" name="idpaciente" value="'.$resultado["idpaciente"].'"></input>
       <input type="text" class="form-control" name="antecedentesE" value="'.$resultado["antecedentes"].'"></input>
 <br>

         <label>Alergias</label>

               <input type="text" class="form-control" name="alergiasE" value="'.$resultado["alergias"].'"   name="alergiasC">
 <br>
               <label>Persona responsable y parentesco:</label>

         <input type="text" class="form-control" name="presponsableE" value="'.$resultado["persona_responsable"].'" name="presponsableC" required>

           
    
               <br>
               <label>Intervenciones quirurgicas separadas por una coma (,)</label>
               <input class="form-control"  name="intervencionesE" value="'.$resultado["intervenciones_quirurgicas"].'"  rows="3"></input>

            
               <br>
               <label>Vacunas:</label>
               <small>En caso de faltar, especificar las que falten.</small>
               <br>
               <small>En caso de estar completas, rellenar campo con "NO"</small>

               <input type="text" class="form-control" name="vacunasE" value="'.$resultado["vacunascompletas"].'" name="vacunasC">

          
               <br>
               <label>Cel:</label>

               <input type="text" class="form-control"  name="celE" value="'.$resultado["cel"].'">

            
               <br>
               <label>Email:</label>

               <input type="text" class="form-control" value="'.$resultado["email"].'" name="emailE">
 <br>
               <label>Estado civil:</label>

               <input type="text" class="form-control"  value="'.$resultado["estado_civil"].'" name="estadocivilE">

            
               <br>
               <label>Ocupacion:</label>

               <input type="text" class="form-control" value="'.$resultado["ocupacion"].'" name="ocupacionE">
 
         
               <br>
               <label>Fecha creación de historial:</label>

               <input type="date" class="form-control" name="fechaE" value="'.$resultado["fecha"].'">

                <br>
               <label>Actualizaciones:</label>
               <small>Separadas por un espacio</small>';
               $text=$resultado["actualizaciones"];
               echo'
               <br>
                <textarea class="form-control" name="actualizaciones" required rows="7">';?>

                <?php echo $text; ?>

                </textarea>
                <?php
                echo'
               <label>Ultima fecha de actualización:</label>
                  <input type="date" class="form-control" name="fechaAct" value="'.$resultado["fechaAct"].'">

                



               ';


                
        
            echo'   <br>
             </div>

             <center><button class="btn btn-success" type="submit">Actualizar historial <i class="fa fa-refresh" </button> </i>
             </center>
            <br>
    
       </form>  ';

              echo'
       <form action="http://localhost/clinica/pdfhist" target="_blank" method="POST">
        <center>
             <input type="hidden" class="form-control" name="antecedentesE" value="'.$resultado["antecedentes"].'"></input>
    <input type="hidden" class="form-control" name="alergiasE" value="'.$resultado["alergias"].'"></input>

      <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">

     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>

   <input type="hidden" class="form-control" name="presponsableE" value="'.$resultado["persona_responsable"].'"></input>
<input type="hidden" class="form-control" name="intervencionesE" value="'.$resultado["intervenciones_quirurgicas"].'">
<input type="hidden" class="form-control" name="vacunasE" value="'.$resultado["vacunascompletas"].'">
<input type="hidden" class="form-control" name="celE" value="'.$resultado["cel"].'">
  <input type="hidden" class="form-control" name="emailE"  value="'.$resultado["email"].'">
<input type="hidden" class="form-control" name="estadocivilE" value="'.$resultado["estado_civil"].'">
<input type="hidden" class="form-control"  name="ocupacionE" value="'.$resultado["ocupacion"].'">
<input type="hidden" class="form-control"  name="fechaE" value="'.$resultado["fecha"].'">
<input type="hidden" class="form-control"  name="actualizaciones" value="'.$resultado["actualizaciones"].'">
<input type="hidden" class="form-control"  name="fechaAct" value="'.$resultado["fechaAct"].'">


    <div class="btn-group">
             <button class="btn btn-primary" type="submit">Descargar historial en PDF <i class="fa fa-download"</button></a></i>
             </div>
       </form>
       <br>
       ';

      