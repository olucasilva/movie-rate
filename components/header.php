<script src="../scripts/login.js"></script>
<header>
    <?php
    $root = $_SERVER['REQUEST_URI'];

    if ($root === "/") {
        echo '<a href="index.php" class="logo"><img class="logo" src="src/logo.png" alt="Logo Rate-Movies"></a>';
    } else {
        echo '<a href="../index.php" class="logo"><img class="logo" src="../src/logo.png" alt="Logo Rate-Movies"></a>';
    }
    ?>
    <div class="menu">
        <nav>
            <div>
                <ul>
                    <li> <a class="navLink" href="../index.php">Início</a></li>
                    <li>
                        <div class="dropdown">
                            <label class="dropbtn">Filmes</label>
                            <div class="dropdown-content">
                                <div class="losangle"></div>
                                <a class="navLink" href="../pages/movies.php">Filmes avaliados</a>
                                <?php
                                if (isset($_SESSION['id'])) {
                                    echo "<a class='navLink' href='../pages/addRate.php'>Avaliar outro filme</a>";
                                } else {
                                    echo "<label class='navLink' onclick='alert(`Você precisa estar logado para deixar uma avaliação`)'>Avaliar outro filme</label>";
                                } ?>
                            </div>
                        </div>
                    </li>
                    <li> <a class="navLink" href="../pages/news.php">Notícias</a></li>
                    <?php
                    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 0) {
                        echo "<div class='dropdown'>
                        <label class='dropbtn'>Administrador</label>
                        <div class='dropdown-content'>
                            <div class='losangle'></div>
                            <li> <a class='navLink' href='../admin/rates.php'>Avaliaçoes</a></li>
                            <li> <a class='navLink' href='../admin/news.php'>Notícias</a></li>
                            <li> <a class='navLink' href='../admin/new.php'>Criar Publicação</a></li>
                        </div>
                    </div>";
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <?php
        if (!isset($_SESSION['id'])) {
            echo "<div class='login'>
            <div class='dropdown'>
            <label class='dropbtn'>Conta</label>
            <div class='dropdown-content'>
                <div class='losangle'></div>
                <label class='navLink' onclick='openDialog()'>Login</label>
                <a class='navLink' href='../pages/cadastro.php'>Cadastro</a>
            </div>
        </div></div>";
        } else {
            if ($_SESSION['imagem'] != '') {
                $image = $_SESSION['imagem'];
            } else {
                $image = '/default.jpg';
            }
            $user = $_SESSION['nome'];
            echo "<div class='login'>
            <div class='dropdown'>
            <label class='dropbtn'><img src='../src/users$image' class='userImage'></label>
            <div class='dropdown-content'>
                <div class='losangle'></div>
                <label>$user</label>
                <a class='navLink' href='../server/logout.php'>Sair</a>
            </div>
        </div></div>";
        }
        ?>
    </div>
</header>