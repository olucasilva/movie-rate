<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];
$date = new DateTimeImmutable($_POST['birth-date']);
$dataNasc = $date->format('Y-m-d');

$query = "insert into `usuarios`(`tipo`, `nome`, `email`, `senha`, `data_de_nascimento`) VALUES ('1','$nome','$email','$senha','$dataNasc')";
mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ' . $current);
?>