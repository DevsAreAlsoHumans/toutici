<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>

    <main class="container main">

        <form class="mobile-search" action="/search" method="get">
            <fieldset role="group" style="margin: 0">
                <input type=" text" id="search" name="search" placeholder="Chercher une annonce" />
                <input type="submit" value="Rechercher" />
            </fieldset>
        </form>

        <br>
        <br>

        <?php include './views/components/session_message.php'; ?>

        <section>
            <h2>Résultats pour <strong><?php echo $search ?></strong></h2>
            <?php if ($filteredAnnouncements): ?>
                <div class="home-grid">
                    <?php foreach ($filteredAnnouncements as $announcement): ?>
                        <article class="small-inline">
                            <div>
                                <h1><?php echo htmlspecialchars($announcement['title']); ?></h1>

                                <p>Price : <?php echo htmlspecialchars($announcement['price']); ?> €</p>

                                <a href="/announcement/<?php echo $announcement['id']; ?>">Lien</a>
                            </div>
                            <?php if ($announcement['image']): ?>
                                <img src="<?php echo "../public/img/" . htmlspecialchars($announcement['image']); ?>"
                                    alt="<?php echo htmlspecialchars($announcement['title']); ?>" class="small-img">
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucune annonce trouvé.</p>
            <?php endif; ?>

        </section>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>