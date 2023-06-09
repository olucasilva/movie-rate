<?php
include '../server/connection.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_GET['id'])) {
  $current = $_SESSION['current'];
  header('Location: ' . $current);
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "select a.*, f.titulo from avalia a, filmes f where a.id = $id and f.id=a.id_filme";
  $data = mysqli_query($connection, $query);
  $item = mysqli_fetch_array($data);
  $titulo = $item['titulo'];
  $comentario = $item['comentario'];
  $nota = $item['nota'];
  $idFilme = $item['id_filme'];
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

  <title>Atualizar Avaliação</title>
</head>

<body>
  <section>
    <form action="../server/updaterate.php" method="post" enctype="multipart/form-data">
      <legend>Novo Comentário</legend>
      <label for="movie">Filme</label>
      <div class="div-input">
        <br />
        <input type='hidden' name='rateId' value="<?php echo $id ?>">
        <input type='hidden' name='movieId' value="<?php echo $idFilme ?>">
        <input type='text' name='movie' value='<?php echo $titulo ?>' disabled />
      </div>
      <br />
      <label for="rate">Nota (0 - 5)</label>
      <div class="div-input">
        <br />
        <!-- adicionar validaçao de tamanho -->
        <input type="number" step="0.01" name="rate" min="0" max="5" value="<?php echo $nota ?>" required />
      </div>
      <br />
      <label for="comment">Comentário</label>
      <div class="div-input">
        <br />
        <textarea name="comment" required><?php echo $comentario?></textarea>
      </div>
      <br />
      <br />
      <hr />
      <br />
      <div class="div-input">
        <label for="button" class="button">
          <button type="submit">Atualizar</button>
        </label>
      </div>
    </form>
  </section>
</body>

</html>