<!-- Se não estiver logado, mandar para a tela de login -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/style.css" />

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <title>Adicionar Avaliação</title>
</head>

<body>
  <section>
    <form action="../server/rent.php" method="post" enctype="multipart/form-data">
      <legend>Novo Comentário</legend>
      <div class="div-input">
        <label for="movie">Filme</label>
        <br />
        <input type="text" name="movie" required />
      </div>
      <br />
      <div class="div-input">
        <label for="rate">Nota (0 - 5)</label>
        <br />
        <!-- adicionar validaçao de tamanho -->
        <input type="number" name="rate" min="0" max="5" required/>
      </div>
      <br />
      <div class="div-input">
        <label for="coment">Comentário</label>
        <br />
        <textarea name="coment" placeholder="Deixe um breve comentário!" required></textarea>
      </div>
      <br />
      <br />
      <hr />
      <br />
      <div class="div-input">
        <label for="button" class="button">
          <button type="submit">Enviar</button>
        </label>
      </div>
    </form>
  </section>
</body>

</html>