<link rel="stylesheet" href="../styles/comment.css">
<div class="comentario">
    <div class="autorImg">
        <img src="../src<?php echo $image ?>" alt="">
    </div>
    <div class="content">
        <div class="autorName">
            <?php echo $usuario ?>
        </div>
        <div class="nota">
                <?php echo $nota ?>
            </div>
        <div class="comment">
            <?php echo $comentario ?>
        </div>
        <div class="rodape">
            <div class="data">
                <?php echo $data ?>
            </div>
            <div class="editar">
                <?php if ($idLogado == $idUsuario) {
                    echo "Editar";
                } ?>
            </div>
        </div>
    </div>
</div>