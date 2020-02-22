<?php
session_start();
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
require 'entities/Post.php';

if(!isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}

if ( $_SERVER['REQUEST_METHOD']==='GET' ){
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $titulo = $_GET['titulo'];
    $texto = $_GET['texto'];
    $autor = $_GET['autor'];
    $img = $_GET['img'];
    $post = new Post($id,$autor,$titulo, $texto,$img);
    if(isset($_COOKIE['visitasVisorPosts'])){
      $visitas = $_COOKIE['visitasVisorPosts'];
      setcookie("visitasVisorPosts", (intval($visitas)+1), time()+3600);
    }else{
      setcookie("visitasVisorPosts", 1, time()+3600);
    }
  }
}else{
  header("Location: leerPosts.php");
  die();
}
  include_once("views/visorPosts.view.php");
  include_once("views/partials/pie.view.php");
?>
