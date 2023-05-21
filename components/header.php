<script src="../scripts/login.js"></script>
<header>
    <div>
        <h1>Avalia Filmes</h1>
    </div>
    <div class="menu">
        <nav>
            <div>
                <ul>
                    <?php
                    if (isset($_SESSION['tipo']) && $_SESSION['tipo']==0) {
                        echo "<li> <a class='navLink' href='../index.php'>Comentários</a></li>";
                        echo "<li> <a class='navLink' href='../index.php'>Criar Publicação</a></li>";
                    }
                    ?>
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
                <a class='navLink' href='../server/logout.php'>Cadastro</a>
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