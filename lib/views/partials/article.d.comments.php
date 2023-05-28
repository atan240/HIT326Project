<?php
if ($statement = $db->prepare("SELECT comment_body, article_ID 
FROM comments WHERE article_ID = ?")) {

    // //Value in the binding array specifies the article ID
    // $binding = array('17'); //'id'?
    // $statement->execute($binding);

    // $articleID = array($_GET['id']); //'id'?
    $statement->execute($articleID);
    // $statement->execute();
    $result = $statement->fetchall(PDO::FETCH_ASSOC);

    //Check for results
    if (!empty($result)) {
        foreach ($result as $item) {
            $comment_body = htmlspecialchars($item['comment_body'], ENT_QUOTES, 'UTF-8');

            echo "<p>$comment_body</p>";
            echo "<p> ----------------</p>";
        }
    } else {
        require VIEWS . '/db_error.html.php';
    }
}
