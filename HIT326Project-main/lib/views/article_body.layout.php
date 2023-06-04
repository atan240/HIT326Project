<!DOCTYPE html>
<html lang="en">
<?php
require PARTIALS . "/site.header.layout.php";
?>

<main>
    <?php
    //Print any errors 
    if (!empty($errors)) {
        echo "<p>We have errors</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>{$error}</li>";
        }
        echo "</ul>";
    } else {
        require MODELS . '/article.a.body.php';
        require MODELS . '/article.b.tags.php';
        require MODELS . '/article.c.commentbox.php';
    }

    ?>
</main>

<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>

</html>