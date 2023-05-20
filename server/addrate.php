<?php
include '../server/connection.php';
session_start();

$idFilme = $_POST['movieId'];
$idUsuario = $_SESSION['id'];
$nota = $_POST['rate'];
$comentario = $_POST['comment'];
$datac = date("Y-m-d");

$query = "select * from filmes where id = $idFilme";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 0) {
  $authorization = 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1NmMyOTg1MmMyNWI3Y2MxMDc3Y2YzOTRkZjIxMDFmNyIsInN1YiI6IjY0MGY1N2VhMmEwOWJjMDBjNTJlNDk0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.fc4Y1kx3Xol40mI_CCULZ2oOOApFn_jopQuTnAStmPw';

  $url = "https://api.themoviedb.org/3/movie/$idFilme?language=pt-BR";
  $options = array(
    'http' => array(
      'header' => "Authorization: $authorization\r\n" .
      "Accept: application/json\r\n"
    )
  );

  $context = stream_context_create($options);
  $response = file_get_contents($url, false, $context);

  if ($response === false) {
    die('Erro na requisição');
  }

  // Usamos json_decode() para decodificar a resposta JSON 
  $data = json_decode($response);
  
  $url = 'https://image.tmdb.org/t/p/w220_and_h330_face' . $data->poster_path; // URL da imagem
  $path = '../src' . $data->poster_path; // Caminho de destino local para salvar a imagem

  // Obtém os dados da imagem da URL
  $dadosImagem = file_get_contents($url);

  if ($path !== false) {
    // Salva os dados da imagem no arquivo local
    file_put_contents($path, $dadosImagem);
  }

  $query = "insert into `filmes`(`id`, `titulo`, `descricao`, `imagem`, `datac`, `duracao`) values ('$data->id','$data->title','$data->overview','$data->poster_path','$data->release_date','$data->runtime')";
  mysqli_query($connection, $query);
}

$query = "insert into `avalia`(`id_filme`, `id_usuario`, `nota`, `comentario`, `datac`) values ('$idFilme','$idUsuario','$nota','$comentario','$datac')";
mysqli_query($connection, $query);
mysqli_close($connection);

header('Location: ../pages/details.php?id=' . $idFilme);
?>