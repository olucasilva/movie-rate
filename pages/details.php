<?php
session_start();

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;
$_SESSION['current'] = $urlCompleta;
$idLogado = $_SESSION['id'];
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
  $movie = mysqli_fetch_array($data);

  $title = $movie['titulo'];
  $poster_path = $movie['imagem'];
  $description = $movie['descricao'];

  ?>
  <section id="container">
    <div class="title">
      <label for="title">
        <?php
        echo $title;
        ?>
      </label>
    </div>
    <div class="details">
      <div class="image">
        <img src="https://image.tmdb.org/t/p/w220_and_h330_face/<?php echo $poster_path ?>">
      </div>
      <div class="content">
        <div class="description">
          <?php
          echo $description;
          ?>
        </div>
        <div>
          <?php
          if (isset($_SESSION['id'])) {
            echo "<br><a href='../pages/addRate.php?id=$id'><button>Avaliar</button></a>";
          } else {
            echo "<br><button onclick='alert(`Você precisa estar logado para deixar uma avaliação`)'>Avaliar</button>";
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
      $query = "select a.id, a.nota, a.comentario, a.datac, a.id_usuario, u.nome from avalia a, usuarios u where a.id_filme=$id and a.id_usuario=u.id";
      $result = mysqli_query($connection, $query);

      while ($comment = mysqli_fetch_array($result)) {
        $idComment = $comment['id'];
        $idUsuario = $comment['id_usuario'];
        $usuario = $comment['nome'];
        $data = new DateTimeImmutable($comment['datac']);
        $data = $data->format('m/d/Y');
        $comentario = $comment['comentario'];
        $nota = $comment['nota'];
        $image = '/logo.png';

        include '../components/comment.php';

        // if ($idUsuario == $idLogado) {
        //   echo "<td><a href='../pages/updateRate.php?id=$idComment'>&#9998;</a></td>
        //         <td><a href='../server/excluiComentario.php?id=$idComment'>&#10006;</a></td>";
        // }
      }

      mysqli_close($connection);
      ?>
      </table>
    </div>
    <footer></footer>
  </section>
</body>

</html>