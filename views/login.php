<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>
    <main class="container main">
        <?php include './views/components/session_message.php'; ?>

        <h2>Connection à votre compte</h2>

        <form action="/toutici/login" method="post">

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-email']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-email"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-email"];
                        unset($_SESSION["error-email"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" aria-invalid="<?php echo isset($_SESSION['error-password']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-password"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-password"];
                        unset($_SESSION["error-password"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <button type="submit">Se Connecter</button>
        </form>
        <small class="center">
            <a href="/toutici/register">Créer un compte</a>
        </small>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>