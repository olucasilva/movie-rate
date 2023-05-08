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
    ?>
    <section id="container">
        <?php

        $data = "../data/series.xml";
        $items = simplexml_load_file($data)->series;
        $items = $items->serie;

        foreach ($items as $item) {
            include '../components/elementNews.php';
        }

        include '../components/loginDialog.php';
        ?>
    </section>
</body>

</html>