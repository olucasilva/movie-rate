<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

if (isset($_GET['id'])) {
  $idComment = $_GET['id'];
  $idLogado = $_SESSION['id'];
}

$query = "select id_usuario from avalia where id=$idComment";
$result = mysqli_query($connection, $query);

$comment = mysqli_fetch_array($result);
$idUsuario = $comment['id_usuario'];
if ($idUsuario == $idLogado || $idLogado == 1) {
  $query = "delete from `avalia` where id='$idComment'";
  mysqli_query($connection, $query);
  mysqli_close($connection);
}
header('Location: ' . $current);
?>