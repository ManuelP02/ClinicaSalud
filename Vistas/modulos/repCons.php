      <div class="content-wrapper">
      	<section class="content-header">
		<h1>Gestor de Reportes por Consultorios</h1>
        <!-- Main content -->
        <section class="content">
            <div class="row">
           
                  <div class="box">
                    <div class="box-body">
                      <form method="POST" action="consPdf" target="_blank">

                          <div class="form-group ">
                            <label>Seleccione el consultorio</label>
                          <select class="form-control selectpicker" id="idconsultorio" name="idconsultorio">
                
                                

                                         <?php 

                                      $columna = null;
                                      $valor = null;

                $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);
                foreach ($resultado as $key => $value) {
                  echo'<option value="'.$value["idconsultorio"].' ">'.$value["nombreconsultorio"].'</option>
                  ';
                  
                }


                ?>

              </select>
              <br>
               <center><button type="submit" class="btn btn-success">Ver PDF de consultorio</button></center>