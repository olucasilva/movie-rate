<script src="../scripts/login.js"></script>
<header>
    <div>
        <?php
            $root = $_SERVER['REQUEST_URI'];

            if ($root === "/"){
                echo '<a href="index.php" class="logo"><img class="logo" src="src\logo.png" alt="Logo Rate-Movies"></a>';
            } else { 
                echo '<a href="../index.php" class="logo"><img class="logo" src="..\src\logo.png" alt="Logo Rate-Movies"></a>';
            }
        ?>
    </div>
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
                                    echo "<a class='navLink' href='../pages/addRate.php'>Deixar uma avaliação</a>";
                                } else {
                                    echo "<label class='navLink' onclick='alert(`Você precisa estar logado para deixar uma avaliação`)'>Deixar uma avaliação</label>";
                                } ?>
                            </div>
                        </div>
                    </li>
                    <li> <a class="navLink" href="../pages/news.php">Notícias</a></li>
                    <?php
                    if (isset($_SESSION['tipo']) && $_SESSION['tipo']==0) {
                        echo "<li> <a class='navLink' href='../admin/rates.php'>Avaliaçoes</a></li>";
                        echo "<li> <a class='navLink' href='../admin/new.php'>Criar Publicação</a></li>";
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
            $nome = $_SESSION['nome'];
            echo "<div class='login'>
            <div class='dropdown'>
            <label class='dropbtn'>$nome</label>
            <div class='dropdown-content'>
                <div class='losangle'></div>
                <label class='navLink'>Minha conta</label>
                <a class='navLink' href='../server/logout.php'>Sair</a>
            </div>
        </div></div>";
        }
        ?>
    </div>
</header>