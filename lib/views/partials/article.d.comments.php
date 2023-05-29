<!-- Show comments for specific article -->

<?php
//Select statement retrieves values from "article_content" table as well as the journalist's full name from the "users" table
if (isset($_GET['id']) && !empty($_GET['id'])) {

    if ($statement = $db->prepare("SELECT c.article_ID, c.comment_body, c.created_at, u.username 
FROM comments c 
JOIN users u ON u.user_ID = c.user_ID 
WHERE c.article_ID = ?
")) {

        // //Value in the binding array specifies the article ID
        // $binding = array('17'); //'id'?
        // $statement->execute($binding);

        $articleID = array($_GET['id']); //'id'?
        $statement->execute($articleID);
        $result = $statement->fetchall(PDO::FETCH_ASSOC);

        //Check for results
        if (!empty($result)) {
            foreach ($result as $item) {
                $comment_body = htmlspecialchars($item['comment_body'], ENT_QUOTES, 'UTF-8');
                $created_at = htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8');

                echo "<div class = 'comment-box'><p class='username'>$username<p class='meta-data'>$created_at</p></p>$comment_body</div>";
            }
        } else {
            require VIEWS . '/db_error.html.php';
        }
    } else {
        require VIEWS . '/db_error.html.php';
    }
}
?>