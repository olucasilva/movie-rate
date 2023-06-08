<link rel="stylesheet" href="../styles/login.css">
<div class='shadow'>
    <div class='login-container'>
        <label class='close' onclick='closeDialog()'>&#10006;</label>
        <form action="../server/login.php" method="post">
            <div>
                <div class="input">
                    Email:
                    <input type="email" name="email">
                </div>
                <div class="input">
                    Senha:
                    <input type="password" name="password">
                </div>
            </div>
            <button class="submit" onclick="submit()">
                ENTRAR
            </butotn>
        </form>
    </div>
</div>