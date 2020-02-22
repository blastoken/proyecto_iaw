<?php
session_start();
include_once("views/partials/header.view.php");
include_once("views/partials/nav.view.php");

require 'database/Connection.php';
require 'database/QueryBuilder.php';
require 'entities/Post.php';

if(!isset($_SESSION['usuarioLogeado'])){
  header("Location: index.php");
  die();
}

if(isset($_COOKIE['visitasLeerPosts'])){
  $visitas = $_COOKIE['visitasLeerPosts'];
  setcookie("visitasLeerPosts", (intval($visitas)+1), time()+3600);
}else{
  setcookie("visitasLeerPosts", 1, time()+3600);
}

try{
$config=require_once 'app/config.php';
$connection = Connection::make($config['database']);

$queryBuilder = new QueryBuilder($connection, 'posts', 'Post');

$posts=$queryBuilder->findAll();
}catch(QueryBuilderException $queryBuilderException)
{
    echo $queryBuilderException->getMessage();
}
  include_once("views/leerPosts.view.php");
  include_once("views/partials/pie.view.php");
?>
