<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../styles/form.css" />
  <link rel="stylesheet" href="../styles/style.css" />
  
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

  <script src="../scripts/form.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <title>Cadastro de usuário</title>
</head>

<body>
  <section>
    <span onclick="history.back()" class="goback">
      &#8617;
    </span>
    <form action="../server/cadastro.php" method="post" enctype="multipart/form-data">
      <legend>Cadastro</legend>
      <label for="first-name">Nome</label>
      <div class="div-input">
        <br />
        <input type="text" name="nome" placeholder="Digite seu nome" required />
      </div>
      <br />
      <label for="email">E-mail</label>
      <div class="div-input">
        <br />
        <input type="email" name="email" placeholder="Digite seu email" required />
      </div>
      <br />
      <label for="password">Senha</label>
      <div class="div-input">
        <br />
        <input type="password" name="password" placeholder="Digite uma senha" required id="password" />
      </div>
      <br />
      <label for="re-password">Repita a Senha</label>
      <div class="div-input">
        <br />
        <input type="password" name="re-password" placeholder="Repita a senha" required id="re-password" />
      </div>
      <br />
      <label for="birth-date">Data de Nascimento </label>
      <div class="div-input">
        <br />
        <input type="date" name="birth-date" required />
      </div>
      
      <label for="">Imagem de perfil</label>
      <div class="div-input">
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