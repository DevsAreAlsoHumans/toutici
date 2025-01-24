<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>

    <main class="container main">

        <?php include './views/components/session_message.php'; ?>

        <section>
            <h2>Hello World !</h2>
            <?php if ($announcements): ?>
                <div class="home-grid">
                    <?php foreach ($announcements as $announcement): ?>
                        <article class="small-inline">
                            <div>
                                <h1><?php echo htmlspecialchars($announcement['title']); ?></h1>

                                <p>Price : <?php echo htmlspecialchars($announcement['price']); ?> €</p>

                                <a href="/announcement/<?php echo $announcement['id']; ?>">Lien</a>
                            </div>
                            <?php if ($announcement['image']): ?>
                                <img src="<?php echo "../public/img/" . htmlspecialchars($announcement['image']); ?>" alt="<?php echo htmlspecialchars($announcement['title']); ?>" class="small-img">
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>No announcements found.</p>
            <?php endif; ?>

        </section>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>