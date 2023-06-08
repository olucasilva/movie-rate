<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

if (!isset($_GET['id'])) {
  header('Location: /');
}
$current = $_SESSION['current'];
$id = $_GET['id'];
$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;
$_SESSION['current'] = $urlCompleta;
$idLogado = $_SESSION['id'];

include '../server/connection.php';

$query = "select * from filmes where id = $id";
$data = mysqli_query($connection, $query);
if (mysqli_num_rows($data) == 0) {
  header('Location: /');
}
$movie = mysqli_fetch_array($data);

$title = $movie['titulo'];
$poster_path = $movie['imagem'];
$description = $movie['descricao'];
$id = $movie['id'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="../scripts/remove.js"></script>

  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/header.css">
  <link rel="stylesheet" href="../styles/details.css">
  <link rel="stylesheet" href="../styles/comment.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <title>
    <?php
    echo $title;
    ?>
  </title>
</head>

<body>
  <?php
  include '../components/header.php';
  include '../components/loginDialog.php';
  ?>
  <section id="container">
    <div class="details">
      <div class="image">
        <img src="../src/movies<?php echo $poster_path ?>">
      </div>
      <div class="content">

        <div class="title">
          <label for="title">
            <?php
            echo $title;
            ?>
          </label>
        </div>
        <div class="description">
          <?php
          echo $description;
          ?>
        </div>
        <div>
          <?php
          if (isset($_SESSION['id'])) {
            echo "<br><a href='../pages/addRate.php?id=$id'><button>Deixar um comentário</button></a>";
          } else {
            echo "<br><button onclick='alert(`Você precisa estar logado para deixar uma avaliação`)'>Deixar um comentário</button>";
          }
          ?>
        </div>
      </div>
    </div>
    <div>
      <div class="title">
        <label for="title">
          Comentários
        </label>
      </div>
      <?php
      $query = "select a.id, a.nota, a.comentario, a.datac, a.id_usuario, u.nome, u.imagem from avalia a, usuarios u where a.id_filme=$id and a.id_usuario=u.id ORDER BY a.datac desc";
      $result = mysqli_query($connection, $query);

      while ($comment = mysqli_fetch_array($result)) {
        $idComment = $comment['id'];
        $idUsuario = $comment['id_usuario'];
        $usuario = $comment['nome'];
        $data = new DateTime($comment['datac']);
        $dataC = $data->format('d/m/Y');
        $today = date_create(date('Y-m-d H:i:s'));
        $interval = date_diff($today, $data);

        if ($interval->format('%y') == 1) {
          $ago = $interval->format('há mais de %y ano');
        } else if ($interval->format('%y') > 1) {
          $ago = $interval->format('há mais de %y anos');
        } else if ($interval->format('%m') == 1) {
          $ago = $interval->format('há %m mês');
        } else if ($interval->format('%m') > 1) {
          $ago = $interval->format('há %m meses');
        } else if ($interval->format('%d') == 7) {
          $ago = 'há uma semana';
        } else if ($interval->format('%d') > 7) {
          $dif = $interval->format('%d') / 7;
          $ago = 'há ' . intval($dif) . ' semanas';
        } else if ($interval->format('%d') > 0) {
          $ago = $interval->format('há %a dias');
        } else if ($interval->format('%d') == 0) {
          if ($interval->format('%h') == 24) {
            $ago = 'Hoje';
          } else if ($interval->format('%h') > 1) {
            $ago = $interval->format('há %h horas');
          } else if ($interval->format('%h') == 1) {
            $ago = $interval->format('há %h hora');
          } else if ($interval->format('%i') > 1) {
            $ago = $interval->format('há %i minutos');
          } else if ($interval->format('%i') == 1) {
            $ago = $interval->format('há %i minuto');
          } else {
            $ago = 'há alguns segundos';
          }
        }


        $comentario = $comment['comentario'];
        $nota = $comment['nota'];
        if ($comment['imagem'] != '') {
          $image = $comment['imagem'];
        } else {
          $image = '../src/users/default.jpg';
        }

        include '../components/comment.php';

      }

      mysqli_close($connection);
      ?>
      </table>
    </div>
    <footer></footer>
  </section>
</body>

</html>