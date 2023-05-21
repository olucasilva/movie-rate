<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

//Verifica se o usuario é admin ou proprietario do comentário

if (isset($_GET['id'])) {
  $idComment = $_GET['id'];
}

$query = "delete from `avalia` where id='$idComment'";
mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ' . $current);
?>