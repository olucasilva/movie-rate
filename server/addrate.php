<?php
include '../server/connection.php';
session_start();
date_default_timezone_set('America/Sao_Paulo');


$idFilme = $_POST['movieId'];
$idUsuario = $_SESSION['id'];
$nota = $_POST['rate'];
$comentario = $_POST['comment'];
$datac = date("Y-m-d H:i:s");

$query = "select id from avalia where id_filme = $idFilme and id_usuario = $idUsuario";
$result = mysqli_query($connection, $query);
if (mysqli_num_rows($result) == 0) {
  $query = "select * from filmes where id = $idFilme";
  $result = mysqli_query($connection, $query);

  if (mysqli_num_rows($result) == 0) {
    include '../server/newMovie.php';
  }

  $query = "insert into `avalia`(`id_filme`, `id_usuario`, `nota`, `comentario`, `datac`) values ('$idFilme','$idUsuario','$nota','$comentario','$datac')";
  mysqli_query($connection, $query);
}
mysqli_close($connection);

header('Location: ../pages/details.php?id=' . $idFilme);
?>