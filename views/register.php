<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>
    <main class="container">
        <?php include './views/components/session_message.php'; ?>

        <form action="/toutici/register" method="POST">
            <label for="last_name">Nom</label>
            <input
                type="text"
                id="last_name"
                name="last_name"
                value="<?php echo isset($_SESSION['form_data']['last_name']) ? htmlspecialchars($_SESSION['form_data']['last_name']) : ''; ?>">
            <small>
                <?php if (isset($_SESSION["error-last_name"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-last_name"];
                        unset($_SESSION["error-last_name"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="first_name">Prénom</label>
            <input
                type="text"
                id="first_name"
                name="first_name"
                value="<?php echo isset($_SESSION['form_data']['first_name']) ? htmlspecialchars($_SESSION['form_data']['first_name']) : ''; ?>">
            <small>
                <?php if (isset($_SESSION["error-first_name"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-first_name"];
                        unset($_SESSION["error-first_name"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
            <small>
                <?php if (isset($_SESSION["error-email"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-email"];
                        unset($_SESSION["error-email"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="phone">Numéro de Téléphone</label>
            <input
                type="tel"
                id="phone"
                name="phone"
                value="<?php echo isset($_SESSION['form_data']['phone']) ? htmlspecialchars($_SESSION['form_data']['phone']) : ''; ?>">
            <small>
                <?php if (isset($_SESSION["error-phone"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-phone"];
                        unset($_SESSION["error-phone"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="location">Adresse</label>
            <input
                type="text"
                id="location"
                name="location">


            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            <small>
                <?php if (isset($_SESSION["error-password"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-password"];
                        unset($_SESSION["error-password"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <button type="submit">S'inscrire</button>
        </form>

        <?php
        unset($_SESSION['form_data']);
        ?>
    </main>
    <?php include './views/components/navigator/footer.php'; ?>
</body>