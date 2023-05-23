<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 0) {
  header('Location: ' . $current);
}

$idUser = $_SESSION['id'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];

if (isset($_POST['favorito'])) {
  $favorito = $_POST['favorito'];
} else {
  $favorito = 0;
}
$idFilme = $_POST['movieId'];
$date = date("Y-m-d");

if (isset($_FILES['image'])) {
  $imageTmpName = $_FILES['image']['tmp_name'];
  $destination = "../src";

  // Usando a função gettimeofday() em conjunto com a função md5() para gerar um nome aleatório e diferente para cada arquivo
  $imageName = "/" . md5(gettimeofday(true)) . ".jpg";

  // move_uploaded_file()
  if (!move_uploaded_file($imageTmpName, $destination . $imageName)) {
    $imageName = '';
  }
}

if ($idFilme != '') {
  include '../server/newMovie.php';
  $query = "insert into `post`(`id_filme`, `id_usuario`, `datac`, `texto`, `favorito`, `titulo`, `imagem`) values ('$idFilme','$idUser','$date','$texto','$favorito','$titulo','$imageName')";
} else {
  $query = "insert into `post`(`id_filme`, `id_usuario`, `datac`, `texto`, `favorito`, `titulo`, `imagem`) values (null,'$idUser','$date','$texto','$favorito','$titulo','$imageName')";
}

mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ' . $current);
?>