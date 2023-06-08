<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0) {

  if (isset($_GET['id'])) {
    $post = $_GET['id'];
  }

  $query = "delete from `post` where id='$post'";
  mysqli_query($connection, $query);
  mysqli_close($connection);

}

header('Location: ' . $current);
?>