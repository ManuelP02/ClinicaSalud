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
    $tablaBD = "recetas";

    $id = substr($_GET["url"], 10);

    $resultado = AtencionesM::VerRecM($tablaBD, $id);


   $tablaBD = "pacientes";
   $idpaciente = $resultado["idpaciente"];
   $resultad = PacientesC::VerPacientesNC($tablaBD, $idpaciente);
  echo'
  <div class="content-wrapper">
   <section class="content-header">
    <center><label>Receta de: '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'<br> Cédula: '.$resultad["documento"].'</label></center>
   </section>

   <section class="content">

     <div class="box">


    <div class="box-body">  
       <form method="POST">

        <div class="panel panel-primary">
         <div class="panel-body">

      <label>Motivo de la consulta:</label>
    
    <input type="hidden" class="form-control" name="idreceta" value="'.$resultado["idreceta"].'"></input>
    <input type="hidden" class="form-control" name="idpaciente" value="'.$resultad["idpaciente"].'"></input>

      <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">

     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>

       <input type="text" class="form-control" name="motivoE" value="'.$resultado["motivo"].'"></input>
 <br>

         <label>Medicamentos:</label>

               <input type="text" class="form-control" name="medicamentoE" value="'.$resultado["medicamento"].'">
 <br>
               <label>Dósis:</label>

         <input type="text" class="form-control" name="dosisE" value="'.$resultado["dosis"].'">

           
               <br>
               <label>Duración:</label>
              <input type="text" class="form-control" name="duracionE" value="'.$resultado["duracion"].'">

            
               <br>';
               $tablaBD = "servicios";
               $columna = "idservicio";
               $valor = $resultado["idservicio"];
               $servicio = ServiciosM::VerServiciosTM($tablaBD, $columna, $valor);

               echo' <label>Servicio Actual: '.$servicio["nombre"].' - Costo: '.$servicio["costo"].' DOP</label>';
               ?>

                <select class="form-control selectpicker" name="idservicio" required>
                    <option value=""></option>
               <?php
                   $columna = null;
                  $valor = null;

                $resultado = ServiciosC::VerServiciosC($columna, $valor);

                foreach ($resultado as $key => $value) {
                  echo'
                    <option value="'.$value["idservicio"].'">'.$value["nombre"].'   - Costo: '.$value["costo"].' DOP</option>';
                  
                }?>
            </select>

         <?php
      $tablaBD = "recetas";

    $id = substr($_GET["url"], 10);

    $resultado = AtencionesM::VerRecM($tablaBD, $id);


         echo'

          
               <br>

               <label>Pago:</label>

         <input type="text" class="form-control" name="pagoE" value="'.$resultado["pago"].'">

          
               <br>
               <label>Plan:</label>

               <input type="text" class="form-control"  name="planE" value="'.$resultado["plan"].'">

               <br>';
               $tablaBD = "doctores";
               $columna = "id";
               $valor = $resultado["id_doctor"];
               $doctores = DoctoresM::VerDoctoresTM($tablaBD, $columna, $valor);

               echo'<label>Creada por:</label>

               <input type="text" class="form-control"  readonly name="id_doctor" value="Dr. '.$doctores["nombre"].' '.$doctores["apellido"].'">
            
               <br>
               <label>Fecha:</label>

               <input type="date" class="form-control" name="fechaE" value="'.$resultado["fecha"].'" name="email">';
 
                
        
            echo'   <br>
             </div>

             <center>
             <div class="btn-group">
             <button class="btn btn-success" type="submit">Actualizar Receta</button></a>
             </div>

  

            <div class="btn-group">
     <a href="http://localhost/clinica/Recetas/'.$resultado["idpaciente"].'"" <button class="btn btn-danger">Regresar</button></a> </div>
</center>
<br>
           </div>
         </div> 
    
       </form>  ';

       echo'
       <form action="http://localhost/clinica/pdfrec" target="_blank" method="POST">
        <center>
             <input type="hidden" class="form-control" name="idreceta" value="'.$resultado["idreceta"].'"></input>
    <input type="hidden" class="form-control" name="idpaciente" value="'.$resultad["idpaciente"].'"></input>

      <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">

     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>

   <input type="hidden" class="form-control" name="motivo" value="'.$resultado["motivo"].'"></input>
<input type="hidden" class="form-control" name="medicamento" value="'.$resultado["medicamento"].'">
<input type="hidden" class="form-control" name="dosis" value="'.$resultado["dosis"].'">
<input type="hidden" class="form-control" name="duracion" value="'.$resultado["duracion"].'">
  <input type="hidden" class="form-control" name="servicio" readonly value="'.$servicio["nombre"].' - Costo: '.$servicio["costo"].' DOP">
<input type="hidden" class="form-control" name="pago" value="'.$resultado["pago"].' DOP">
<input type="hidden" class="form-control"  name="plan" value="'.$resultado["plan"].'">
<input type="hidden" class="form-control"  name="doctor" value="Dr. '.$doctores["nombre"].' '.$doctores["apellido"].'">
<input type="hidden" class="form-control" name="fecha" value="'.$resultado["fecha"].'">
    <div class="btn-group">
             <button class="btn btn-primary" type="submit">Descargar PDF</button></a>
             </div>
       </form>
       ';


       
       $editarA = new AtencionesC();
       $editarA -> ActualizarRecetaC();
       ?>