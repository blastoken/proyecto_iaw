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
        <td>Index.php</td>
        <td><?php if(isset($_COOKIE['visitasIndex'])){ echo $_COOKIE['visitasIndex']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>LeerPosts.php</td>
        <td><?php if(isset($_COOKIE['visitasLeerPosts'])){ echo $_COOKIE['visitasLeerPosts']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>DatosUsuario.php</td>
        <td><?php if(isset($_COOKIE['visitasDatosUsuario'])){ echo $_COOKIE['visitasDatosUsuario']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Login.php</td>
        <td><?php if(isset($_COOKIE['visitasLogin'])){ echo $_COOKIE['visitasLogin']; }else{ echo 0; }?></td>
      </tr>
      <tr>
        <td>Registro.php</td>
        <td><?php if(isset($_COOKIE['visitasRegistro'])){ echo $_COOKIE['visitasRegistro']; }else{ echo 0; }?></td>
      </tr>
    </tbody>
  </table>
</div>
