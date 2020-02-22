<?php
session_start();
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
if(isset($_SESSION['usuarioLogeado'])){
  $usuarioActual = $_SESSION['usuarioLogeado'];
if(isset($_COOKIE['visitasDatosUsuario'])){
  $visitas = $_COOKIE['visitasDatosUsuario'];
  setcookie("visitasDatosUsuario", (intval($visitas)+1), time()+3600);
}else{
  setcookie("visitasDatosUsuario", 1, time()+3600);
}

include_once("views/datosUsuarios.view.php");
}else{
  header("Location: index.php");
  die();
}
include_once("views/partials/pie.view.php");
?>
