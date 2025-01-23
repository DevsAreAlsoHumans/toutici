<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>
    <main class="container main">
        <?php include './views/components/session_message.php'; ?>

        <h2>Création d'une nouvelle annonce</h2>

        <form action="/login" method="post">

            <label for="title">Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="<?php echo isset($_SESSION['form_data']['title']) ? htmlspecialchars($_SESSION['form_data']['title']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-title']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-title"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-title"];
                        unset($_SESSION["error-title"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="description">Description</label>
            <textarea type="text" name="description" id="description" aria-invalid="<?php echo isset($_SESSION['error-description']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-description"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-description"];
                        unset($_SESSION["error-description"]) ?>
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