<?php
session_start();

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;

$_SESSION['current'] = $urlCompleta;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/dataLoad.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <title>Filmes</title>
</head>

<body>
  <?php
  include '../components/header.php';
  include '../components/loginDialog.php';
  ?>
  <section id="container">
    <?php
    include '../server/connection.php';
    $i = 0;

    $query = "select f.id, f.titulo, f.imagem, sum(a.nota)/count(*) as nota from filmes f, avalia a where a.id_filme = f.id group by a.id_filme";
    $data = mysqli_query($connection, $query);

    while ($item = mysqli_fetch_array($data)) {
      $id = $item["id"];
      $title = $item['titulo'];
      $poster_path = $item['imagem'];
      $nota = round($item['nota'], 2);

      if ($i == 0) {
        echo "<div class='movies-rows'>";
      }
      echo "<div class='element-movie'>
              <a href='details.php?id=$id' class='link'>
                <img class='filme' id='$id' src='../src/movies$poster_path'/>
              </a>
              <div class='title'><div class='title-text'>$title</div></div>";
      ?>
      <a title="<?php echo number_format($nota, 2, ',', '.') ?>" class="rate">
            <div class="nota" style="width: calc(23px*$nota)">
                <div class="avaliacao">
                    <div class="star-icon">&#9734;</div>
                    <div class="star-icon">&#9734;</div>
                    <div class="star-icon">&#9734;</div>
                    <div class="star-icon">&#9734;</div>
                    <div class="star-icon">&#9734;</div>
                </div>
            </div>
            <div class="nota" style="width: calc(23px*<?php echo $nota ?>)">
                <div class="avaliacao">
                    <div class="star-icon">&#9733;</div>
                    <div class="star-icon">&#9733;</div>
                    <div class="star-icon">&#9733;</div>
                    <div class="star-icon">&#9733;</div>
                    <div class="star-icon">&#9733;</div>
                </div>
            </div>
        </a>
      <?php
      echo "</div>";
      $i++;
      if ($i == 5) {
        echo "</div>";
        $i = 0;
      }
    }
    if ($i != 0) {
      echo "</div>";
    }
    ?>
    <footer></footer>
  </section>
</body>

</html>