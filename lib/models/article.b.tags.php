<!-- Return article tags -->

<?php
//Show article tags
if ($statement = $db->prepare("SELECT tags.tag_name FROM article_content JOIN article_tags ON article_content.article_ID = article_tags.article_ID JOIN tags ON article_tags.tag_ID = tags.tag_ID WHERE article_content.article_ID = ?")) {

    //Value in the binding array specifies the article ID
    // $binding = array('17');

    $statement->execute($articleID);

    $result = $statement->fetchall(PDO::FETCH_ASSOC);

    //Check for results
    echo "<h2>Tags</h2>";
    if (!empty($result)) {
        foreach ($result as $item) {
            $tags = htmlspecialchars($item['tag_name'], ENT_QUOTES, 'UTF-8');
            echo "<p><a href = 'http://localhost/index.php?search=$tags'>#$tags</a></p>";
        }
        
    } else {
        require VIEWS . '/db_error.html.php';
    }
}
