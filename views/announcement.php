<?php include './views/components/head.php'; ?>

<?php include './views/components/navigator/header.php'; ?>

<main class="container main center">
    <?php if ($announcement): ?>
        <article class="inline">
            <div>
                <h1><?php echo htmlspecialchars($announcement['title']); ?></h1>
                <details close>
                    <summary>Description</summary>
                    <p><?php echo nl2br(htmlspecialchars($announcement['description'])); ?></p>
                </details>

                <p>Price : <?php echo htmlspecialchars($announcement['price']); ?> €</p>
                <p>Category : <?php echo htmlspecialchars($category['name']); ?></p>
                <p>Posted by : <?php echo htmlspecialchars($userAnnouncement['first_name'] . " " . $userAnnouncement['last_name']); ?></p>
            </div>
            <?php if ($announcement['image']): ?>
                <img src="<?php echo "../public/img/" . htmlspecialchars($announcement['image']); ?>" alt="<?php echo htmlspecialchars($announcement['title']); ?>" class="img">
            <?php endif; ?>
        </article>
    <?php else: ?>
        <p>Annonce non trouvée.</p>
    <?php endif; ?>
</main>

<?php include './views/components/navigator/footer.php'; ?>