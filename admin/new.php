<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 0) {
  $current = $_SESSION['current'];
  header('Location: ' . $current);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/newPost.css" />
  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/search.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

  <title>Cadastro de usuário</title>
</head>

<body>
  <section>
    <form action="../server/newPost.php" method="post" enctype="multipart/form-data">
      <legend>Nova Publicação</legend>
      <div class="div-input">
        <label for="title">Título</label>
        <br />
        <input type="text" name="titulo" placeholder="Digite o título" required />
      </div>
      <br />
      <div class="div-input">
        <label for="text">Texto</label>
        <br />
        <textarea name="texto" required></textarea>
      </div>
      <br />
      <div class="div-input">
        <label for="favorito">Adicionar a tela inicial</label>
        <input type="checkbox" name="favorito" value="1" />

        <label for="re-password">É sobre um filme</label>
        <input type="checkbox" name="isMovie" value="1" />
      </div>
      <br>

      <div class="div-input">
        <label for="re-password">Nome do filme</label>
        <br />
        <input type='text' name='movie' id='buscaInput' placeholder="Digite o nome do filme" disabled required
          autofocus />
        <input type='hidden' id='movieId' name='movieId'>
        <div id="resultadoBusca" class='result'>
        </div>
        <script src="../scripts/form.js"></script>
        <script src="../scripts/search.js"></script>
      </div>

      <br />
      <div class="div-input">
        <label for="">Imagem de capa</label>
        <div class="div-file">
          <div class="div-input-file">
            <label class="input-personalizado">
              <span class="botao-selecionar">Selecione uma imagem</span>
              <input type="file" class="input-file" name="image" accept="image/*">
            </label>
          </div>
          <img class="imagem" />
        </div>
      </div>
      <br />
      <br />
      <hr />
      <br />
      <div class="div-input">
        <label for="button" class="button">
          <button type="submit">Cadastrar</button>
        </label>
      </div>
    </form>
  </section>
</body>

</html>