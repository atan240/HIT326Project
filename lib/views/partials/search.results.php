<!DOCTYPE html>
<html lang="en">
<?php
require PARTIALS . "/site.header.layout.php";
?>

<?php

if (isset($_GET['search']) && !empty($_GET['search'])) {

    if ($statement = $db->prepare("SELECT ac.news_title
            FROM tags t
            INNER JOIN article_tags atags ON t.tag_ID = atags.tag_ID
            INNER JOIN article_content ac ON atags.article_ID = ac.article_ID
            WHERE t.tag_name LIKE ?
")) {

        $search_result = $_GET['search'];
        $search_input = array($_GET['search']);
        $statement->execute($search_input);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Print the results
        echo "<h1>Search Results</h1>";
        echo "<h2>Articles with #$search_result</h2>";
        if (count($result) > 0) {
            foreach ($result as $item) {
                $news_title = htmlspecialchars($item['news_title'], ENT_QUOTES, 'UTF-8');
                echo "<br><div class = 'comment-box'>$news_title</div>";
            }
        } else {
            echo "No results found";
        }
    } else {
        // Handle database errors
        require VIEWS . '/db_error.html.php';
    }
}

?>

<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>

</html>