<?php
session_start();

$current=$_SESSION['current'];

// Limpar a variável de sessão específica
unset($_SESSION['id']);
unset($_SESSION['nome']);
unset($_SESSION['tipo']);

// Finalizar a sessão
session_destroy();
header('Location: '.$current);
?>