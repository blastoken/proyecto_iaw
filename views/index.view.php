<div class="container">
  <div class="row justify-content-between">
    <div class="col-2 col-sm-4 shadow p-3 mb-5 bg-light rounded text-center">Bienvenido <?php echo $usuarioLogeado['nombre'];?></div>
    <div class="col-2 col-sm-3 align-items-center">
      <form action="index.php" method="post">
        <input id="cerrarSesion" type="submit" name="cerrarSesion" value="Cerrar Sesion"  class="btn btn-danger w-100 mt-1 blancoTexto"/>
      </form>
    </div>
  </div>
  <table class="table">
    <thead class="thead-dark">
      <th>Pàgina</th>
      <th>Nº Visitas</th>
    </thead>
    <tbody>
      <tr>
        <td>Inicio</td>
        <td><?php if(isset($_COOKIE['visitasIndex'])){ echo $_COOKIE['visitasIndex']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Crear posts</td>
        <td><?php if(isset($_COOKIE['visitasCrearPosts'])){ echo $_COOKIE['visitasCrearPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Todos los posts</td>
        <td><?php if(isset($_COOKIE['visitasLeerPosts'])){ echo $_COOKIE['visitasLeerPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Editar posts</td>
        <td><?php if(isset($_COOKIE['visitasEditarPosts'])){ echo $_COOKIE['visitasEditarPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Eliminar posts</td>
        <td><?php if(isset($_COOKIE['visitasEliminarPosts'])){ echo $_COOKIE['visitasEliminarPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Visor Post</td>
        <td><?php if(isset($_COOKIE['visitasVisorPosts'])){ echo $_COOKIE['visitasVisorPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Datos del usuario</td>
        <td><?php if(isset($_COOKIE['visitasDatosUsuario'])){ echo $_COOKIE['visitasDatosUsuario']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Login</td>
        <td><?php if(isset($_COOKIE['visitasLogin'])){ echo $_COOKIE['visitasLogin']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Registro</td>
        <td><?php if(isset($_COOKIE['visitasRegistro'])){ echo $_COOKIE['visitasRegistro']; }else{ echo 0; }?></td>
      </tr>
    </tbody>
  </table>
</div>
