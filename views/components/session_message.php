<?php if (isset($_SESSION["message"])): ?>
    <p class="pico-color-green-500">
        <?php echo $_SESSION["message"];
        unset($_SESSION["message"]); ?>
    </p>
<?php endif; ?>

<?php if (isset($_SESSION["error"])): ?>
    <p class="pico-color-red-500">
        <?php echo $_SESSION["error"];
        unset($_SESSION["error"]); ?>
    </p>
<?php endif; ?>