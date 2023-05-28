<?php
echo "<h2>Comments</h2>";

require PARTIALS . "/article.commentbox.layout.php";

if (isset($_POST['_method']) && $_POST['_method'] == 'post') {
    // var_dump($_POST);
    if (!empty($_POST['comment_body'])) {
        $errors = array();
        require 'db.php';
        if (!$db) {
            require 'db_error.html.php';
            exit();
        }
        $comment_body = htmlspecialchars($_POST['comment_body'], ENT_QUOTES);

        try {
            //Insert into comments table
            $query4 = "INSERT INTO comments (comment_body, created_at) VALUES (?,NOW())"; //insert id

            $statement = $db->prepare($query4);
            $binding = array($comment_body);
            $statement->execute($binding);
        } catch (PDOException $e) {
            $errors[] = "Statement error because: {$e->getMessage()}";
            require VIEWS . '/db_error.html.php';
            exit();
        }

        exit();
    } else {
        // header('Location: index.php?upload');
        require VIEWS . '/db_error.html.php';
        exit();
    }
}
