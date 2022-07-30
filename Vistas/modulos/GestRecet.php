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
       <center><h2>Receta de '.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'</h2>
<label>Cédula: '.$resultad["documento"].'</label><br>
  <a href="http://localhost/clinica/Recetas/'.$resultad["idpaciente"].'">
            <button class="btn btn-danger" name="btnEnviar">Regresar <i class="fa fa-arrow-left"></i></button></a>
           
</center>
   </section>

   <section class="content">

   


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
             <button class="btn btn-success" type="submit">Actualizar Receta <i class="fa fa-refresh"> </i></button></a>
             </div>

  
</center>
<br>
          
    
       </form>  ';

       echo'
       <form action="http://localhost/clinica/pdfrec" target="_blank" method="POST">
        <center>
            <div class="btn-group">
             <button class="btn btn-primary" type="submit">Descargar Receta PDF <i class="fa fa-download"> </i></button> </a>
             </div>
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
       </form>
       ';


       
       $editarA = new AtencionesC();
       $editarA -> ActualizarRecetaC();
      echo'



      <form action="http://localhost/clinica/pdfserv" target="_blank" method="POST">
<section class="content">

     <div class="box">


    <div class="box-body">  
    ';
               $tablaBD = "servicios";
               $columna = "idservicio";
               $valor = $resultado["idservicio"];
               $servicio = ServiciosM::VerServiciosTM($tablaBD, $columna, $valor);
               echo' 
               <input type="hidden" class="form-control" name="idreceta" value="'.$resultado["idreceta"].'"></input>
            <input type="hidden" class="form-control" name="idservicio" value="'.$servicio["idservicio"].'"></input>


        <input type="hidden" class="form-control" name="nombrep" value="'.$resultad["nombre"].' '.$resultad["Apaterno"].' '.$resultad["Amaterno"].'">
     <input type="hidden" class="form-control" name="documento" value="'.$resultad["documento"].'"></input>
                    <input type="hidden" class="form-control" name="fecha" readonly value="'.$resultado["fecha"].'">

               <center><h2>Descargar factura</h2></center>
               <label>Servicio generado por receta:</label>
         <input type="text" class="form-control" name="servicio" readonly value="'.$servicio["nombre"].' - Costo: '.$servicio["costo"].' DOP">

         <br>
         <label>Pago del servicio:</label>

         <input type="text" class="form-control" name="pago" readonly value="'.$resultado["pago"].' DOP">
         <br>
         <center>
<button class="btn btn-info" type="submit"> Descargar Factura en PDF <i class="fa fa-download"></button></i>
    
</center>
       ';
             $tablaBD = "doctores";
               $columna = "id";
               $valor = $resultado["id_doctor"];
               $doctores = DoctoresM::VerDoctoresTM($tablaBD, $columna, $valor);

      echo'<input type="hidden" class="form-control" name="doctor" value="Dr. '.$doctores["nombre"].' '.$doctores["apellido"].'">

      </form>
      ';


