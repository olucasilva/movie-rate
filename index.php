<?php
session_start();

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;

$_SESSION['current'] = $urlCompleta;

include 'components/header.php';
include 'components/loginDialog.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/header.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <title>PopFlix - Filmes</title>
</head>

<body>
  <section id="container">
    <table>
      <?php
      include 'server/connection.php';
      $query = "select * from `post` where `favorito`=1";
      $result = mysqli_query($connection, $query);

      while ($post = mysqli_fetch_array($result)) {
        $id = $post['id'];
        $titulo = $post['titulo'];
        $imagem = $post['imagem'];

        echo "<tr>
            <td>$id</td>
            <td>$titulo</td>
            <td><img src='../src$imagem' style='width: 100px'></td>
          </tr>";
      }
      ?>
    </table>
  </section>
</body>

</html>