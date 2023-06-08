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
  <link rel="stylesheet" href="../styles/slideshow.css">

  <script src="../scripts/slideshow.js"></script>
  <script src="https://kit.fontawesome.com/9c674c2acd.js" crossorigin="anonymous"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <title>Rate Movies</title>
</head>

<body>
  <section id="container">
        <?php
        include 'server/connection.php';
        $query = "select * from `post` where `favorito`=1 order by datac desc";
        $result = mysqli_query($connection, $query);
        $qtd = mysqli_num_rows($result);

        if ($qtd>0) {
          echo '<div class="carousel">';
          echo '<div class="carousel-container">';
        }
        while ($post = mysqli_fetch_array($result)) {
          $id = $post['id'];
          $titulo = $post['titulo'];
          $imagem = $post['imagem'];

          echo '<div class="slide">';
          echo '<a href="../pages/post.php?id='.$id.'">';
          echo '<img src="../src/posts' . $imagem . '" alt="' . $titulo . '">';
          echo '<div class="caption">' . $titulo . '</div>';
          echo '</a>';
          echo '</div>';
        }
        if ($qtd>0) {
          echo '</div>';
          echo '<ul class="indicators"></ul>';
          echo '<button class="prev"><i class="fas fa-chevron-left"></i></button>';
          echo '<button class="next"><i class="fas fa-chevron-right"></i></button>';
          echo '</div>';
        }
        ?>
  </section>
</body>

</html>