<?php
session_start();

$hostAtual = $_SERVER['HTTP_HOST'];
$pathAtual = $_SERVER['REQUEST_URI'];
$urlCompleta = "http://" . $hostAtual . $pathAtual;

$_SESSION['current'] = $urlCompleta;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/elementNews.css">
    <link rel="stylesheet" href="../styles/news.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

    <script src="../scripts/script.js"></script>

    <title>Notícias</title>
</head>

<body>
    <?php
    include '../components/header.php';
    include '../components/loginDialog.php';
    ?>
    <section id="container">
        <?php
        include '../server/connection.php';
        $i = 0;

        $query = "select * from post";
        $data = mysqli_query($connection, $query);
        $item = mysqli_fetch_array($data);
        $lenght = mysqli_num_rows($data);

        for ($i = 0; $i < $lenght; $i++) {
            $id = $item["id"];
            $title = $item['titulo'];
            $content = $item['texto'];
            $image = $item['imagem'];

            echo "<div class='news-element' id='newsElement'>
                    <img class='detail-cover' id='moviePoster' src='../src/$image' />
                    <div class='info'>
                        <div class='news-title' id='ts'>
                            <label for='title' id='newsTitle'>$title</label>
                        </div>
                        <div class='news-preview'>
                            <p id='newsPreview'>$content</p>
                        </div>
                    </div>
                  </div>";
        }
        ?>
    </section>
</body>

</html>