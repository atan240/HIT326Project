<!-- Show comments for specific article -->

<?php
//Select statement retrieves the comment and timestamp of the comment from the "comments" table and the username  from the "users" table
if (isset($_GET['id']) && !empty($_GET['id'])) {

    if ($statement = $db->prepare("SELECT c.article_ID, c.comment_body, c.created_at, u.username 
FROM comments c 
LEFT JOIN users u ON u.user_ID = c.user_ID 
WHERE c.article_ID = ?
")) {

        // //Value in the binding array specifies the article ID
        // $binding = array('17'); //'id'?
        // $statement->execute($binding);

        // $articleID = $_GET['id']; 
        $statement->execute(array($articleID));
        $result = $statement->fetchall(PDO::FETCH_ASSOC);

        //Loop returns all comments with timestamps and username related to the "article_ID"
        if (!empty($result)) {
            foreach ($result as $item) {
                $comment_body = htmlspecialchars($item['comment_body'], ENT_QUOTES, 'UTF-8');
                $created_at = htmlspecialchars($item['created_at'], ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($item['username'], ENT_QUOTES, 'UTF-8');

                echo "<div class = 'comment-box'><p class='username'>$username<p class='meta-data'>$created_at</p></p>$comment_body</div>";
            }
        } else {
            // Handle database errors
            echo "No comments. Be the first to comment!";
        }
    } else {
        require VIEWS . '/db_error.html.php';
    }
} else {
    require VIEWS . '/db_error.html.php';
}
?>