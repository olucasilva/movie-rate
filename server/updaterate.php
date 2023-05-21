<?php
include '../server/connection.php';
session_start();

$idFilme = $_POST['movieId'];
$idAvaliacao = $_POST['rateId'];
$nota = $_POST['rate'];
$comentario = $_POST['comment'];

$query = "update `avalia` set `nota`='$nota',`comentario`='$comentario' where id = $idAvaliacao";
mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ../pages/details.php?id=' . $idFilme);
?>