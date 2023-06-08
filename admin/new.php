<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['tipo'] != 0) {
  $current = $_SESSION['current'];
  header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/style.css" />
  <link rel="stylesheet" href="../styles/search.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="../scripts/form.js"></script>

  <title>Adicionar Notícia</title>
</head>

<body>
  <section>
    <span onclick="history.back()" class="goback">
      &#8617;
    </span>
    <form action="../server/newPost.php" method="post" enctype="multipart/form-data">
      <legend>Nova Publicação</legend>
      <label for="title">Título</label>
      <div class="div-input">
        <br />
        <input type="text" name="titulo" placeholder="Digite o título" required />
      </div>
      <br />
      <label for="text">Texto</label>
      <div class="div-input">
        <br />
        <textarea name="texto" id="myTextarea"></textarea>
      </div>
      <br />
      <label for="">Imagem de capa</label>
      <div class="div-input">
        <div>
          <div class="div-file">
            <div class="div-input-file">
              <label class="input-personalizado">
                <span class="botao-selecionar">Selecione uma imagem</span>
                <input type="file" class="input-file" name="image" accept="image/*" required>
              </label>
            </div>
            <img class="imagem" />
          </div>
        </div>
        <div>
          <label for="favorito">Adicionar a tela inicial</label>
          <input type="checkbox" name="favorito" value="1" />
        </div>
      </div>
      <br />
      <br />
      <hr />
      <br />
      <div class="div-input">
        <label for="button" class="button">
          <button type="submit">Publicar</button>
        </label>
      </div>
    </form>
  </section>
</body>

</html>