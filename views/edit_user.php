<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>

    <?php include './views/components/session_message.php'; ?>

    <main class="container main">
        <form action=<?php echo "/toutici/user/" . $user['id'] . "/edit"; ?> method="post">
            <label for="first_name">First Name</label>
            <input
                type="text"
                id="first_name"
                name="first_name"
                value="<?php echo isset($user['first_name']) ? htmlspecialchars($user['first_name']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-first_name']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-first_name"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-first_name"];
                        unset($_SESSION["error-first_name"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="last_name">Last Name</label>
            <input
                type="text"
                id="last_name"
                name="last_name"
                value="<?php echo isset($user['last_name']) ? htmlspecialchars($user['last_name']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-last_name']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-last_name"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-last_name"];
                        unset($_SESSION["error-last_name"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-email']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-email"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-email"];
                        unset($_SESSION["error-email"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="<?php echo isset($user['phone']) ? htmlspecialchars($user['phone']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-phone']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-phone"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-phone"];
                        unset($_SESSION["error-phone"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" aria-invalid="<?php echo isset($_SESSION['error-password']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-password"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-password"];
                        unset($_SESSION["error-password"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="location">Location</label>
            <input
                type="text"
                id="location"
                name="location"
                value="<?php echo isset($user['location']) ? htmlspecialchars($user['location']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-location']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-location"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-location"];
                        unset($_SESSION["error-location"]) ?>
                    </p>
                <?php endif; ?>
            </small>


            <button type="submit">Edit</button>

        </form>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>