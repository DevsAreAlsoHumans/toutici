<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>

    <?php include './views/components/session_message.php'; ?>

    <main class="container main">
        <section>
            <h2>Hello World !</h2>
            <?php
            if (isset($user)) {
                echo "<a href='/announcement/create'>";
                echo "<button>Créer une annonce</button>";
                echo "</a>";
            }
            ?>
        </section>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>