<?php
session_start();
include_once("utils/utilidades.php");
error_reporting(0);
if(isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}

$errores = [];
if(isset($_POST['btnLogin'])){
  if(comprobacionLogin($_POST['usuario'],$_POST['pass'])){
    $usuario = getUserByUsuario($_POST['usuario']);
    $_SESSION['usuarioLogeado'] = $usuario;
    header("Location: index.php");
    die();
  }else{
    array_push($errores,"No existe el usuario o la contraseña es incorrecta");
  }
}

if(isset($_POST['btnRegistro'])){
  $_SESSION['usuario']=$_POST['usuario'];
  $_SESSION['pass']=$_POST['pass'];
  header("Location: registro.php");
  die();
}

if(isset($_COOKIE['visitasLogin'])){
  $visitas = $_COOKIE['visitasLogin'];
  setcookie("visitasLogin", (intval($visitas)+1), time()+3600);
}else{
  setcookie("visitasLogin", 1, time()+3600);
}
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
include_once("views/login.view.php");
include_once("views/partials/pie.view.php");
?>
