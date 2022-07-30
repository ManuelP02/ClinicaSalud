<div class="login-box">
  <div class="login-logo">
     <center><img src="Vistas/img/logo2.png" class="img-responsive" style="margin-top: 1%"></center>
    <a href=""><b>SGCM</b>SG</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesión como administrador</p>

    <form method="post">


      <div class="form-group has-feedback">

        <input type="text" class="form-control" name="usuario-Ing" placeholder="Usuario">

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="clave-Ing" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="font-size: 17px;">Iniciar sesión</button></form>
        </div>
        <!-- /.col -->
      </div>

      <?php

      $ingreso = new AdminC();
      $ingreso -> IngresarAdminC();

      ?>
       <div class="row">
    <div class="col-xs-12">
    <a href="seleccionar">
      <br>
          <button class="btn btn-light btn-block btn-flat" style="border: 1px solid #3c8dbc; font-size: 16px;">Regresar</button>
        </a>
      </div></div>

    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
 <footer class="bg-dark text-center text-white">
  <!-- Grid container -->
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
 <div class="footer" style="position: fixed;  left:  0; bottom:  0; width: 100%; text-align: center;">
        SGCM 2022 &copy; Todos los derechos reservados
        <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"
        ><i class="fa fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"
        ><i class="fa fa-twitter"></i
      ></a>
            <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"
        ><i class="fa fa-whatsapp"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#" role="button"
        ><i class="fa fa-instagram"></i
      ></a>
    </section>
      </div>
  <!-- Copyright -->
</footer>