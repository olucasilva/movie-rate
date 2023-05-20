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

  <script src="../scripts/script.js"></script>

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
              <a href='details.php?id=$id'>
                <img class='filme' id='$id' src='https://image.tmdb.org/t/p/w220_and_h330_face$poster_path'/>
              </a>
              <label>$title</label>
              <label>$nota</label>
            </div>";
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
  </section>
</body>

</html>