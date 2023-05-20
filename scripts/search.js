document.getElementById('buscaInput').addEventListener('input', fazerBusca);

function selecionaFilme(title, id) {
  const titleInput = document.getElementById('buscaInput');
  const movieId = document.getElementById('movieId');

  titleInput.value = title;resultadoBusca.innerHTML = '';
  movieId.value = id;
}

function fazerBusca() {
  const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI1NmMyOTg1MmMyNWI3Y2MxMDc3Y2YzOTRkZjIxMDFmNyIsInN1YiI6IjY0MGY1N2VhMmEwOWJjMDBjNTJlNDk0MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.fc4Y1kx3Xol40mI_CCULZ2oOOApFn_jopQuTnAStmPw'
    }
  };

  const termoBusca = document.getElementById('buscaInput').value.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
  const resultadoBusca = document.getElementById('resultadoBusca');
  resultadoBusca.innerHTML = ''; // Limpar os resultados anteriores

  if (termoBusca === '') {
    // Se o valor do input estiver vazio, limpar os resultados de busca
    return;
  }

  fetch(`https://api.themoviedb.org/3/search/movie?query=${termoBusca}&include_adult=false&language=pt-BR&page=1`, options)
    .then(response => response.json())
    .then(response => {
      const results = response.results;
      results.forEach(movie => {
        const label = document.createElement('label');
        label.id = movie.id;
        label.className = 'label';
        label.textContent = movie.title;
        label.addEventListener('click', function () {
          selecionaFilme(movie.title, movie.id); // Supondo que você precise passar o ID do filme para a função selecionaFilme
        });

        resultadoBusca.appendChild(label);
      });
    })
    .catch(err => console.error(err));
}