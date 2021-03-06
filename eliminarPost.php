<?php
include_once("utils/utilidades.php");
require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entities/Post.php';
if(!isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}
if(isset($_GET['id'])){
  try {
    $config=require_once 'app/config.php';
    $connection = Connection::make($config['database']);

    $queryBuilder = new QueryBuilder($connection, 'posts', 'Post');
    $queryBuilder->delete($_GET['id']);
    unlink($_GET['img']);

    if(isset($_COOKIE['visitasEliminarPosts'])){
      $visitas = $_COOKIE['visitasEliminarPosts'];
      setcookie("visitasEliminarPosts", (intval($visitas)+1), time()+3600);
    }else{
      setcookie("visitasEliminarPosts", 1, time()+3600);
    }

    header("Location: leerPosts.php");
    die();
  }catch(QueryBuilderException $queryBuilderException)
  {
      echo $queryBuilderException->getMessage();
  }

}
?>
