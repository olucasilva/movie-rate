<?php
include '../server/connection.php';
session_start();

$current = $_SESSION['current'];

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['password'];
$date = new DateTimeImmutable($_POST['birth-date']);
$dataNasc = $date->format('Y-m-d');

if (isset($_FILES['image'])) {
    $imageTmpName = $_FILES['image']['tmp_name'];
    $destination = "../src/users";
  
    // Usando a função gettimeofday() em conjunto com a função md5() para gerar um nome aleatório e diferente para cada arquivo
    $imageName = "/" . md5(gettimeofday(true)) . ".jpg";
  
    // move_uploaded_file()
    if (!move_uploaded_file($imageTmpName, $destination . $imageName)) {
      $imageName = '';
    }
  }

$query = "insert into `usuarios`(`tipo`, `nome`, `email`, `senha`, `data_de_nascimento`, `imagem`) VALUES ('1','$nome','$email','$senha','$dataNasc','$imageName')";
mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ' . $current);
?>