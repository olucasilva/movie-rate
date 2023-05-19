<?php
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
  <link rel="stylesheet" href="../styles/details.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="../scripts/cart.js"></script>

  <title>PopFlix - Filmes</title>
</head>

<body>
  <?php
  include '../components/header.php';
  include '../components/loginDialog.php';

  include '../server/connection.php';

  $query = "select * from filmes where id = $id";
  $data = mysqli_query($connection, $query);
  $item = mysqli_fetch_array($data);

  $title = $item['titulo'];
  $poster_path = $item['imagem'];
  $description = $item['descricao'];
  ?>
  <section id="container">
  <img src="https://image.tmdb.org/t/p/w220_and_h330_face/<?php echo $poster_path ?>">
  <br>
  <?php
  echo $title; ?>
  <br>
  <?php
  echo $description;
  ?>
  </section>
</body>

</html>