<?php
session_start();
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");
include_once("utils/utilidades.php");
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entities/Post.php';
if(!isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}
$edicion=false;
$erroresPost = array();
$esCorrecto = false;
if ( $_SERVER['REQUEST_METHOD']==='POST' ){
  try{

    $config=require_once 'app/config.php';
    $connection = Connection::make($config['database']);

    $queryBuilder = new QueryBuilder($connection, 'posts', 'Post');

  if(isset($_POST['publicar'])){
    if($_POST['titulo'] !== ""){
      if($_POST['texto'] !== ""){
        $img=$_FILES['imagen'];
        $erroresPost = validarFichero($img);
        if (empty($erroresPost)) {

            /*nombre original del fichero cuando se subió al servidor*/
            $nombreFichero = time() . $img['name'];
            $ruta = "imgs/posts/" .  $nombreFichero;

            move_uploaded_file($img['tmp_name'], $ruta);
            $img = $ruta;

            $post = new Post(0, $_SESSION['usuarioLogeado']['usuario'], $_POST['titulo'], $_POST['texto'], $nombreFichero);

            $queryBuilder->save($post);

        }

        if(isset($_COOKIE['visitasCrearPosts'])){
          $visitas = $_COOKIE['visitasCrearPosts'];
          setcookie("visitasCrearPosts", (intval($visitas)+1), time()+3600);
        }else{
          setcookie("visitasCrearPosts", 1, time()+3600);
        }
        $esCorrecto = true;
        header("Location: leerPosts.php");
        die();

      }else{
        array_push($erroresPost, "El post debe contener texto...");
      }
    }else{
      array_push($erroresPost, "El post debe contener un título...");
    }
  }

  if(isset($_POST['editar'])){
    if(isset($_POST['id'])){
      $imgAnterior = $_POST['imgAnterior'];
      $img = $_FILES['imagen'];
      if($img['size'] > 0){
        $erroresPost = validarFichero($img);
        if (empty($erroresPost)) {

            $nombreFichero = time() . $img['name'];
            $ruta = "imgs/posts/" .  $nombreFichero;

            move_uploaded_file($img['tmp_name'], $ruta);
            unlink($imgAnterior);
            $imgPost = $nombreFichero;
        }
      }else{
        echo $imgAnterior;
        $imgPost = explode("/",$imgAnterior)[2];
      }
      if(sizeof($erroresPost)==0){
        $post = new Post($_POST['id'], $_SESSION['usuarioLogeado']['usuario'] ,$_POST['titulo'], $_POST['texto'], $imgPost);
        $queryBuilder->update($post);

        if(isset($_COOKIE['visitasEditarPosts'])){
          $visitas = $_COOKIE['visitasEditarPosts'];
          setcookie("visitasEditarPosts", (intval($visitas)+1), time()+3600);
        }else{
          setcookie("visitasEditarPosts", 1, time()+3600);
        }
        
        header("Location: leerPosts.php");
        die();
      }
    }
  }

  }catch(QueryBuilderException $queryBuilderException)
  {
      array_push($erroresPost,$queryBuilderException->getMessage());
  }

}
if ( $_SERVER['REQUEST_METHOD']==='GET' ){
  if(isset($_GET['id'])){
    $post = new Post($_GET['id'],$_SESSION['usuarioLogeado']['usuario'],$_GET['titulo'],$_GET['texto'],$_GET['img']);
    $edicion = true;
  }
}

$_SESSION['erroresPost'] = $erroresPost;
include_once("views/crearPost.view.php");

include_once("views/partials/pie.view.php");
?>
