<?php
include '../server/connection.php';
session_start();

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
if (isset($_POST['favorito'])) {
  $favorito = $_POST['favorito'];
} else {
  $favorito = 0;
}
$imageName = '';
if (isset($_FILES['image'])) {
  $imageTmpName = $_FILES['image']['tmp_name'];
  $destination = "../src/posts";

  // Usando a função gettimeofday() em conjunto com a função md5() para gerar um nome aleatório e diferente para cada arquivo
  $imageName = "/" . md5(gettimeofday(true)) . ".jpg";

  // move_uploaded_file()
  if (!move_uploaded_file($imageTmpName, $destination . $imageName)) {
    $imageName = '';
  }
}
if ($imageName != '') {
  $query = "update `post` set `texto`='$texto',`favorito`='$favorito',`titulo`='$titulo',`imagem`='$imageName' where id = $id";
} else {
  $query = "update `post` set `texto`='$texto',`favorito`='$favorito',`titulo`='$titulo' where id = $id";
}

mysqli_query($connection, $query);
mysqli_close($connection);
$current = $_SESSION['current'];
header('Location: ' . $current);
?>