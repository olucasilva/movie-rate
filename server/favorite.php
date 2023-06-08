<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

if (isset($_GET['id'])) {
  $idPost = $_GET['id'];
}
if (isset($_GET['isfavorite'])) {
  $isfavorite = $_GET['isfavorite'];
}

if ($isfavorite==1) {
  $query = "update `post` set `favorito`=0 WHERE id=$idPost";
} else {
  $query = "update `post` set `favorito`=1 WHERE id=$idPost";
}


mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ' . $current);
?>