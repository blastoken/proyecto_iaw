<div class="container mt-5">
  <?php if(sizeof($errores) > 0){?>
  <div class="alert alert-danger text-center" role="alert">
    <?php
    foreach ($errores as $key => $value) {
      echo $value."<br/>";
    }
    ?>
  </div>
  <?php }?>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form method="post">
          <input type="text" id="usuario" name="usuario" class="form-control text-center mb-1" placeholder="Usuario">
          <input type="password" id="pass" name="pass" class="form-control text-center mb-1" placeholder="Contraseña">
          <input id="login" type="submit" name="btnLogin" value="Login" class="btn btn-primary w-100 mt-1 blancoTexto"/>
          <input id="registro" type="submit" name="btnRegistro" value="Registro"  class="btn btn-outline-primary w-100 mt-1"/>
      </form>
    </div>
  </div>
