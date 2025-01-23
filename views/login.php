<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>
    <main class="container main">
        <?php include './views/components/session_message.php'; ?>

        <form action="/login" method="post">

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
            <small>
                <?php if (isset($_SESSION["error-email"])): ?>
                    <p style="color: #ce7e7b;">
                        <?php echo $_SESSION["error-email"];
                        unset($_SESSION["error-email"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <small>
                <?php if (isset($_SESSION["error-password"])): ?>
                    <p style="color: #ce7e7b;">
                        <?php echo $_SESSION["error-password"];
                        unset($_SESSION["error-password"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <button type="submit">Se Connecter</button>
        </form>
        <small class="center">
            <a href="/register">Créer un compte</a>
        </small>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>