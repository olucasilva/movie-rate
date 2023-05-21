<?php
// Caso o filme não exista no banco de dados, vamos inclui-lo automaticamente com os dados a partir da API do TMDB
// Dfinimos a chave de autenticação usada para garantir acesso a API
$authorization = 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1NmMyOTg1MmMyNWI3Y2MxMDc3Y2YzOTRkZjIxMDFmNyIsInN1YiI6IjY0MGY1N2VhMmEwOWJjMDBjNTJlNDk0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.fc4Y1kx3Xol40mI_CCULZ2oOOApFn_jopQuTnAStmPw';

// Definimos o endpoint da API (URL de busca)
$url = "https://api.themoviedb.org/3/movie/$idFilme?language=pt-BR";

// Definimos os cabeçalhos para a requisição HTTP
$options = array(
  'http' => array(
    'header' => "Authorization: $authorization\r\n" .
    "Accept: application/json\r\n"
  )
);

// Definimos as opções de contexto usando a função stream_context_create() e passamos os cabeçalhos definidos anteriormente
$context = stream_context_create($options);

// Utilizamos a função file_get_contents() para fazer a requisição GET. 
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

$query = "insert into `filmes`(`id`, `titulo`, `descricao`, `imagem`, `datac`) values ('$data->id','$data->title','$data->overview','$data->poster_path','$data->release_date')";
mysqli_query($connection, $query);
?>