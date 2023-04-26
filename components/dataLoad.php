<link rel="stylesheet" href="../styles/dataLoad.css" />
<section id="container">
  <?php
  $i = 0;
      $data = file_get_contents('../data/movies.json');
    $items = json_decode($data);

  foreach ($items as $item) {
    if ($i == 0) {
      echo "<div class='movies-rows' id='row$detailId'>";
    }
    include 'elementMovie.php';
    $i++;
    if ($i == 5) {
      echo "</div>";
      $i = 0;
    }
  }
  if ($i != 0) {
    echo "</div>";
    include 'details.php';
  }
  ?>
  <script>
    for (let i = 0; i < localStorage.length; i++) {
      const movie = document.getElementById(localStorage.key(i));
      try {
        movie.classList.add('oncart');
      } catch (error) {
        console.log(error);
      }
    }
  </script>
</section>