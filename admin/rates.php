<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo']!=0) {
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

  <title>Avaliações</title>
</head>

<body>
  <section id="container">
    <table border="1px" style="margin: 0 auto">
      <tr>
        <th>Autor</th>
        <th>Filme</th>
        <th>Nota</th>
        <th>Comentario</th>
        <th>Data</th>
        <th></th>
      </tr>
      <?php
      include '../server/connection.php';
      $query = "select a.id, a.nota, a.comentario, a.datac, u.nome, f.titulo from avalia a, usuarios u, filmes f where a.id_filme=f.id and a.id_usuario=u.id order by a.datac desc";
      $result = mysqli_query($connection, $query);

      while ($comment = mysqli_fetch_array($result)) {
        $id = $comment['id'];
        $usuario = $comment['nome'];
        $filme = $comment['titulo'];
        $data = new DateTimeImmutable($comment['datac']);
        $data = $data->format('d/m/Y');
        $comentario = $comment['comentario'];
        $nota = $comment['nota'];
        echo "<tr>
                  <td>$usuario</td>
                  <td>$filme</td>
                  <td>$nota</td>
                  <td>$comentario</td>
                  <td>$data</td>
                  <td><label class='excluir' onclick='excluir($id)'>&#10006;</label></td>
                </tr>";
      }

      mysqli_close($connection);
      ?>
    </table>
  </section>
</body>

</html>