<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 0) {
  $current = $_SESSION['current'];
  header('Location: /');
}

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;
$_SESSION['current'] = $urlCompleta;

include '../components/header.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/rates.css">
  <script src="../scripts/remove.js"></script>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <title>Notícias</title>
</head>

<body>
  <section id="container">
    <table border="1px" style="margin: 0 auto">
      <tr>
        <th>Título</th>
        <th>Data</th>
        <th>Favorito</th>
        <th></th>
        <th></th>
      </tr>
      <?php
      include '../server/connection.php';
      $query = "select * from post order by datac desc";
      $result = mysqli_query($connection, $query);

      while ($item = mysqli_fetch_array($result)) {
        $id = $item['id'];
        $title = $item['titulo'];
        $data = new DateTimeImmutable($item['datac']);
        $data = $data->format('d/m/Y');
        $isFavorite = $item['favorito'];
        echo "<tr><td>$title</td>";
        echo "  <td>$data</td>";
        if ($isFavorite == 1) {
          echo "<td><a href='../server/favorite.php?id=$id&isfavorite=1' class='favorite'>&#9733;</a></td>";
        } else {
          echo "<td><a href='../server/favorite.php?id=$id&isfavorite=0' class='favorite'>&#9734;</a></td>";
        }
        echo "<td><a href='../pages/updatePost.php?id=$id' class='editar'>Editar</a></td>";
        echo "<td><label class='excluir' onclick='excluirPost($id)'>&#10006;</label></td></tr>";
      }

      mysqli_close($connection);
      ?>
    </table>
  </section>
</body>

</html>