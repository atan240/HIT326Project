<!-- Functionality for search box to search for articles by tag -->

<!DOCTYPE html>
<html lang="en">
<?php
require PARTIALS . "/site.header.layout.php";
?>

<?php
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Regex to remove special characters in search input
    $search = $_GET['search'];
    $search = preg_replace('/[^a-zA-Z0-9]/', '', $search);
    
    // Select statement to return the article title and article ID
    if ($statement = $db->prepare("SELECT ac.news_title, ac.article_ID
            FROM tags t
            INNER JOIN article_tags atags ON t.tag_ID = atags.tag_ID
            INNER JOIN article_content ac ON atags.article_ID = ac.article_ID
            WHERE t.tag_name LIKE ?
    ")) {
        $search_input = "%".$search."%";
        $statement->execute([$search_input]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Loop returns the name of the article as a hyperlink to the article itself
        echo "<h1>Search Results</h1>";
        echo "<h2>Articles with #".$_GET['search']."</h2>";
        if (count($result) > 0) {
            foreach ($result as $item) {
                $news_title = htmlspecialchars($item['news_title'], ENT_QUOTES, 'UTF-8');
                $article_ID = htmlspecialchars($item['article_ID'], ENT_QUOTES, 'UTF-8');
                echo "<br><div class='comment-box'><a href='http://localhost/index.php?id=$article_ID'>$news_title</a></div>";
            }
        } else {
            echo "No results found";
        }
    } else {
        // Handle database errors
        require VIEWS . '/db_error.html.php';
    }
} else {
    require VIEWS . '/db_error.html.php';
}

?>

<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>

</html>