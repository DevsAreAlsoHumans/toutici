<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>


    <main class="container main">
        <?php include './views/components/session_message.php'; ?>

        <section>
            <h2>Hello <?php if (isset($user)) echo $user['last_name'] . " " . $user['first_name']  ?></h2>
            <?php
            echo "
            <a href='/toutici/user/" . $user["id"] . "/edit'>
                <button>
                    Edit
               </button>
            </a>
            <a href='/toutici/user/" . $user["id"] . "/delete'>
                <button>
                    Delete
               </button>
            </a>
            ";
            ?>

            <h3>Your Announcements</h3>
            <?php if ($announcements): ?>
                <ul>
                    <?php foreach ($announcements as $announcement): ?>
                        <li>
                            <a href="/toutici/announcement/<?php echo $announcement['id']; ?>">
                                <?php echo htmlspecialchars($announcement['title']); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No announcements found.</p>
            <?php endif; ?>
        </section>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>