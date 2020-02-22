<?php
session_start();
if(isset($_POST['cerrarSesion'])){
  unset($_SESSION['usuarioLogeado']);
}else if (isset($_GET['cerrarSesion'])){
  unset($_SESSION['usuarioLogeado']);
}

$logged = false;

if(isset($_SESSION['usuarioLogeado'])){
  $logged = true;
  $usuarioLogeado = $_SESSION['usuarioLogeado'];
}

include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
if($logged){
  if(isset($_COOKIE['visitasIndex'])){
    $visitas = $_COOKIE['visitasIndex'];
    setcookie("visitasIndex", (intval($visitas)+1), time()+3600);
  }else{
    setcookie("visitasIndex", 1, time()+3600);
  }
  include_once("views/index.view.php");
}else{
  header("Location: login.php");
  die();
}

include_once("views/partials/pie.view.php");
?>
