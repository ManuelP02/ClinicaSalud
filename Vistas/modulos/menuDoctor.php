  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu">
        
        <li>
          <a href="http://localhost/clinica/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>
            <?php 

            echo'<a href="http://localhost/clinica/Citas/'.$_SESSION["id"].'">';

            ?>
                <li>
  
            <i class="fa fa-calendar-plus-o"></i>
            <span>Citas</span>
          </a>
        </li>
                  <li>
          <a href="http://localhost/clinica/pacientes">
            <i class="fa fa-users"></i>
            <span>Pacientes</span>
          </a>
        </li>
                        <li>
          <a href="http://localhost/clinica/atencion">
            <i class="fa fa-address-card"></i>
            <span>Atención Médica</span>
          </a>
        </li>

                 <li>
                          <?php

          echo'<a href="http://localhost/clinica/historialdoctor/'.$_SESSION["id"].'">';
            
                          ?>
            <i class="fa fa-history"></i>
            <span>Historial de citas</span>
          </a>
        </li>



      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>