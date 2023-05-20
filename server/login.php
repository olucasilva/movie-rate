<?php
session_start();
$email=$_POST['email'];
$password=$_POST['password'];

include '../server/connection.php';

$query = "select id from usuarios where email='$email' and senha='$password'";
$data = mysqli_query($connection, $query);
$item = mysqli_fetch_array($data);
        
if (isset($item['id'])) {
    $_SESSION['id']=$item['id'];
}
header('Location: /');
?>