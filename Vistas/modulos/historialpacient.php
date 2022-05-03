<?php
if($_SESSION["rol"] != "Paciente"){

  echo '
  <script>
  window.location = "inicio";
  </script>';
  return;

}
?>      


             <?php 

        $historial = new AtencionesC();
        $historial -> VerAtencionC();


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
     <h1>Historial Clínico de '.$_SESSION["nombre"].' '.$_SESSION["Apaterno"].' '.$_SESSION["Amaterno"].'</h1>
   </section>

   <section class="content">

     <div class="box">';


      echo'<div class="box-body">  
       <form action="http://localhost/clinica/pdfhist" target="_blank" method="POST">

        <div class="panel panel-primary">
         <div class="panel-body">
         <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">

     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>

      <label>Antecedentes:</label>
    
    <input type="hidden" class="form-control" name="idp" value="'.$resultado["idpaciente"].'"></input>
       <input type="text" class="form-control" name="antecedentesE" readonly value="'.$resultado["antecedentes"].'"></input>
 <br>

         <label>Alergias:</label>

               <input type="text" class="form-control" name="alergiasE" readonly value="'.$resultado["alergias"].'">
 <br>
               <label>Persona responsable y parentesco:</label>

         <input type="text" class="form-control" name="presponsableE" readonly value="'.$resultado["persona_responsable"].'">

           
    
               <br>
               <label>Intervenciones quirurgicas separadas por una coma (,):</label>
               <input class="form-control"  name="intervencionesE" value="'.$resultado["intervenciones_quirurgicas"].'" readonly rows="3"></input>

            
               <br>
               <label>Vacunas completas:</label>
               <small>En caso de faltar, especificar las que falten.</small>
               <br>
               <small>En caso de estar completas, rellenar campo con "SI"</small>

               <input type="text" class="form-control" name="vacunasE" readonly value="'.$resultado["vacunascompletas"].'">

          
               <br>
               <label>Cel:</label>

               <input type="text" class="form-control"  name="celE" readonly value="'.$resultado["cel"].'">

            
               <br>
               <label>Email:</label>

               <input type="text" class="form-control" readonly value="'.$resultado["email"].'" name="emailE">
 <br>
               <label>Estado civil:</label>

               <input type="text" class="form-control" readonly value="'.$resultado["estado_civil"].'" name="estadocivilE">

            
               <br>
               <label>Ocupacion:</label>

               <input type="text" class="form-control" readonly value="'.$resultado["ocupacion"].'" name="ocupacionE">
 
         
               <br>
               <label>Fecha creación de historial:</label>

               <input type="date" class="form-control" readonly name="fechaE" value="'.$resultado["fecha"].'">';

                
        
            echo'   <br>
             </div>

             <center>
<button class="btn btn-success" type="submit"> Descargar historial en PDF <i class="fa fa-download"></button></i>
     <a href="http://localhost/clinica/inicio" <button class="btn btn-danger"> Regresar</button></a>
    
</center>
           </div>
         </div> 
    
       </form>  ';

      