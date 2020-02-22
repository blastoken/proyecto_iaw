<?php
if(isset($_SESSION['erroresRegistro'])){
  $erroresRegistro=$_SESSION['erroresRegistro'];
}else{
  $erroresRegistro = [];
}
?>
<div class="container mt-5">
<?php if(sizeof($erroresRegistro) > 0){?>
<div class="alert alert-danger" role="alert">
  <strong>El usuario:</strong><br/>
  <?php
  foreach ($erroresRegistro as $key => $value) {
    echo $value."<br/>";
  }
  ?>
</div>
<?php }?>
  <div class="row justify-content-center align-items-center h-100">
    <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
      <form method="post">
          <input type="text" id="nombre" name="nombre" class="form-control text-center mb-1" placeholder="Nombre" value=<?php if(isset($_SESSION['formularioRegistro'])){echo $_SESSION['formularioRegistro']['nombre'];}?>>
          <input type="text" id="apellidos" name="apellidos" class="form-control text-center mb-1" placeholder="Apellidos" value=<?php if(isset($_SESSION['formularioRegistro'])){echo $_SESSION['formularioRegistro']['apellidos'];}?>>
          <input type="text" id="usuario" name="usuario" class="form-control text-center mb-1" placeholder="Usuario (email)" value=<?php if(isset($_SESSION['formularioRegistro'])){echo $_SESSION['formularioRegistro']['usuario'];}?>>
          <input type="password" id="pass" name="pass" class="form-control text-center mb-1" placeholder="Contraseña" value=<?php if(isset($_SESSION['formularioRegistro'])){echo $_SESSION['formularioRegistro']['pass'];}?>>
          <input type="password" id="pass2" name="pass2" class="form-control text-center mb-1" placeholder="Repite contraseña" value=<?php if(isset($_SESSION['formularioRegistro'])){echo $_SESSION['formularioRegistro']['pass2'];}?>>
          <input id="registrarse" type="submit" name="registrarse" value="Registrarse"  class="btn btn-primary w-100 mt-1 blancoTexto"/>
      </form>
    </div>
  </div>
