<script src="../scripts/login.js"></script>
<header>
    <div>
        <h1>Avalia Filmes</h1>
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
                                <a class="navLink" href="../pages/addRate.php">Deixar uma avaliação</a>
                            </div>
                        </div>
                    </li>
                    <li> <a class="navLink" href="../pages/news.php">Notícias</a></li>
                </ul>
            </div>
        </nav>
        <div class="login" onclick="openDialog()">
            Login/Cadastro
        </div>
    </div>
</header>