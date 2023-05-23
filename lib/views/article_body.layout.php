<!DOCTYPE html>
<html lang="en">
<?php
require PARTIALS . "/site.header.layout.php";
?>

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

        <?php
        //Print any errors 
        if (!empty($errors)) {
            echo "<p>We have errors</p>";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>{$error}</li>";
            }
            echo "</ul>";
        }

        //Print the list of players
        if (!empty($list)) {
            foreach ($list as $player) {
                $fname = htmlspecialchars($player['user_FN'], ENT_QUOTES, 'UTF-8');
                $sname = htmlspecialchars($player['user_LN'], ENT_QUOTES, 'UTF-8');
                $role = htmlspecialchars($player['user_role'], ENT_QUOTES, 'UTF-8');
                echo "<h2>{$role}</h2>";
                echo "<p>{$fname}, {$sname}</p>";
            }
        } else {
            echo "<h2>List is empty</h2>";
        }
        ?>
    </article>
</main>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>

</html>