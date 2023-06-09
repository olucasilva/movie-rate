<?php
include '../server/connection.php';
session_start();

if (!isset($_SESSION['id'])) {
  $current = $_SESSION['current'];
  header('Location: ' . $current);
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "select titulo from filmes where id = $id";
  $data = mysqli_query($connection, $query);
  $item = mysqli_fetch_array($data);
  $titulo = $item['titulo'];
}

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;

$_SESSION['current'] = $urlCompleta;

?>

<!-- Se não estiver logado, mandar para a tela de login -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/search.css" />
  <link rel="stylesheet" href="../styles/style.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <title>Adicionar avaliação</title>
</head>

<body>
  <section>
    <span onclick="history.back()" class="goback">
      &#8617;
    </span>
    <form action="../server/addrate.php" method="post" enctype="multipart/form-data">
      <legend>Novo Comentário</legend>
      <label for="movie">Filme</label>
      <div class="div-input">
        <br />
        <?php
        if (isset($titulo)) {
          echo "<input type='hidden' name='movieId' value='$id'>";
          echo "<input type='text' name='movie' value='$titulo' disabled />";
        } else {
          echo "<input type='text' name='movie' id='buscaInput' autocomplete='off'  required autofocus/>";
          echo "<input type='hidden' id='movieId' name='movieId'>";
        }
        ?>
      </div>
      <div id="resultadoBusca" class='result'>
      </div>
      <script src="../scripts/search.js"></script>
      <br />
      <label for="rate">Nota (0 - 5)</label>
      <div class="div-input">
        <br />
        <!-- adicionar validaçao de tamanho -->
        <input type="number" step="0.01" name="rate" min="0" max="5" required />
      </div>
      <br />
      <label for="comment">Comentário</label>
      <div class="div-input">
        <br />
        <textarea name="comment" placeholder="Deixe um breve comentário!" required></textarea>
      </div>
      <br />
      <br />
      <hr />
      <br />
      <div class="div-input">
        <label for="button" class="button">
          <button type="submit">Adicionar Avaliação</button>
        </label>
      </div>
    </form>
  </section>
</body>

</html>