<?php
require PARTIALS . "/site.header.layout.php";
?>
<!DOCTYPE html>
<html lang="en">
<main>
    <article>
        <header>
            <?php
            echo "<h1> [Article Title] </h1>";
            echo "<p class='meta-data'>By Jane Doe | 7/15/2021 | 10:00 AM</p>";
            // require VIEWS."/{$content}.php"
            ?>
        </header>
        <?php
        echo "[Image]";
        echo "<p>[Article body text]</p>";
        ?>
    </article>
</main>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>