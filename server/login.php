<?php
session_start();

$current = $_SESSION['current'];

$email = $_POST['email'];
$password = $_POST['password'];

include '../server/connection.php';

$query = "select id, nome, tipo, imagem from usuarios where email='$email' and senha='$password'";
$result = mysqli_query($connection, $query);
$item = mysqli_fetch_array($result);

if (isset($item['id'])) {
    $_SESSION['id'] = $item['id'];
    $_SESSION['nome'] = $item['nome'];
    $_SESSION['tipo'] = $item['tipo'];
    $_SESSION['imagem'] = $item['imagem'];
}
header('Location: ' . $current);
?>