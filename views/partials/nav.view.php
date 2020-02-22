<div class="container p-3">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="crearPost.php">Crear Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="leerPosts.php">Todos los posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="datosUsuario.php">Datos del usuario</a>
        </li>
        <?php if(isset($_SESSION['usuarioLogeado'])){  ?>
          <li class="nav-item">
            <a class="nav-link" href="index.php?cerrarSesion=">Logout <?php echo $_SESSION['usuarioLogeado']['usuario']?></a>
          </li>
        <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</div>
