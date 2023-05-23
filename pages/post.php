<?php
session_start();

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;
$_SESSION['current'] = $urlCompleta;
if (isset($_SESSION['tipo'])) {
  $userType = $_SESSION['tipo'];
} else {
  $userType = 1;
}
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/post.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="../scripts/cart.js"></script>

  <title>Rate Movies</title>
</head>

<body>
  <?php
  include '../components/header.php';
  include '../components/loginDialog.php';
  include '../server/connection.php';

  $query = "select * from post where id = $id";
  $data = mysqli_query($connection, $query);
  $post = mysqli_fetch_array($data);

  $title = $post['titulo'];
  $poster_path = $post['imagem'];
  $description = $post['texto'];
  $isFavorite = $post['favorito'];

  ?>
  <section id="container">
    <div class="topo">
      <label for="title" class="title">
        <?php
        echo $title;
        ?>
      </label>
      <?php
      if ($userType == 0) {
        if ($isFavorite == 1) {
          echo "<div class='favorite'>
          &#9733;
        </div>";
        } else {
          echo "<div class='favorite'>
          &#9734;
        </div>";
        }
      }
      ?>
    </div>
    <div class="image">
      <img src="../src<?php echo $poster_path; ?>" alt="">
    </div>
    <div class="content">
      <?php
      echo $description;
      ?>
    </div>
  </section>
</body>

</html>