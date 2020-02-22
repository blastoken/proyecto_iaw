<?php
session_start();
if(isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
include_once("utils/utilidades.php");
if(isset($_COOKIE['visitasRegistro'])){
  $visitas = $_COOKIE['visitasRegistro'];
  setcookie("visitasRegistro", (intval($visitas)+1), time()+3600);
}else{
  setcookie("visitasRegistro", 1, time()+3600);
}
$erroresRegistro = array();
$_SESSION['erroresRegistro'] = [];
if(isset($_POST['registrarse'])){
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $usuario = $_POST['usuario'];
  $pass = $_POST['pass'];
  $pass2 = $_POST['pass2'];
  $arrayUsuario = array('nombre' => $nombre, 'apellidos' => $apellidos, 'usuario' => $usuario, 'pass' => $pass, 'pass2' => $pass2);
  $erroresRegistro = validarCampos($arrayUsuario);
  if(sizeof($erroresRegistro) > 0){
    $_SESSION['erroresRegistro'] = $erroresRegistro;
    $_SESSION['formularioRegistro'] = $arrayUsuario;
  }else{
      if(signupUser($arrayUsuario)){
        $_SESSION['usuarioLogeado'] = $arrayUsuario;
        unset($_SESSION['formularioRegistro']);
        unset($_SESSION['erroresRegistro']);
        header("Location: index.php");
        die();
      }else{
        array_push($erroresRegistro, "El nombre de usuario se encuentra en uso");
      }
  }
}
include_once("views/registro.view.php");
unset($_SESSION['formularioRegistro']);
include_once("views/partials/pie.view.php");
?>
