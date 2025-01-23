<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>

    <?php include './views/components/session_message.php'; ?>

    <main class="container main">
        <section>
            <h2>Hello <?php if (isset($user)) echo $user['last_name'] . " " . $user['first_name']  ?></h2>
        </section>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>