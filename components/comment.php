<div class="comentario">
    <div class="autorImg">
        <img src="../src/users<?php echo $image ?>" alt="">
    </div>
    <div class="content">
        <div class="autorName">
            <?php echo "<b>" . $usuario . "</b>" ?>
            &#9679;
            <a title="<?php echo $dataC ?>"><?php echo $ago ?></a>
        </div>
        <div class="data">
        </div>
        <a title="<?php echo number_format($nota, 2, ',', '.') ?>">
            <div class="rate">
                <div class="nota" style="width: calc(23px*$nota)">
                    <div class="avaliacao">
                        <div class="star-icon">&#9734;</div>
                        <div class="star-icon">&#9734;</div>
                        <div class="star-icon">&#9734;</div>
                        <div class="star-icon">&#9734;</div>
                        <div class="star-icon">&#9734;</div>
                    </div>
                </div>
                <div class="nota" style="width: calc(23px*<?php echo $nota ?>)">
                    <div class="avaliacao">
                        <div class="star-icon">&#9733;</div>
                        <div class="star-icon">&#9733;</div>
                        <div class="star-icon">&#9733;</div>
                        <div class="star-icon">&#9733;</div>
                        <div class="star-icon">&#9733;</div>
                    </div>
                </div>
            </div>
        </a>
        <div class="comment">
            <?php echo $comentario ?>
        </div>
        <div class="rodape">
            <div class="editar">
                <?php if ($idLogado == $idUsuario) {
                    echo "<a href='../pages/updateRate.php?id=$idComment'>Editar</a>";
                } ?>
            </div>
            <div>
                <?php if ($idLogado == $idUsuario) {
                    echo "<label class='excluir' onclick='excluir($idComment)'>&#10006;</label>";
                } ?>
            </div>
        </div>
    </div>
</div>
<hr>