<?php include './views/components/head.php'; ?>

<body>
    <?php include './views/components/navigator/header.php'; ?>
    <main class="container main">
        <?php include './views/components/session_message.php'; ?>

        <h2>Création d'une nouvelle annonce</h2>

        <form action="/toutici/announcement/create" method="post" enctype="multipart/form-data">

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
            <textarea name="description" id="description" aria-invalid="<?php echo isset($_SESSION['error-description']) ? 'true' : 'null'; ?>">
                <?php echo isset($_SESSION['form_data']['description']) ? htmlspecialchars($_SESSION['form_data']['description']) : ''; ?>
            </textarea>
            <small>
                <?php if (isset($_SESSION["error-description"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-description"];
                        unset($_SESSION["error-description"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="category">Category</label>
            <select id="category" name="category">
                <option value="" disabled selected>--Please choose an option--</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo htmlspecialchars($category['id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label for="price">Price</label>
            <input
                type="number"
                id="price"
                name="price"
                min="0"
                value="<?php echo isset($_SESSION['form_data']['price']) ? htmlspecialchars($_SESSION['form_data']['price']) : ''; ?>"
                aria-invalid="<?php echo isset($_SESSION['error-price']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-price"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-price"];
                        unset($_SESSION["error-price"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <label for="image">Image</label>
            <input
                type="file"
                id="image"
                name="image"
                aria-invalid="<?php echo isset($_SESSION['error-image']) ? 'true' : 'null'; ?>">
            <small>
                <?php if (isset($_SESSION["error-image"])): ?>
                    <p class="pico-color-red-500">
                        <?php echo $_SESSION["error-image"];
                        unset($_SESSION["error-image"]) ?>
                    </p>
                <?php endif; ?>
            </small>

            <button type="submit">Créer</button>
        </form>
    </main>

    <?php include './views/components/navigator/footer.php'; ?>
</body>