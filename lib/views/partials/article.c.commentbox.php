<!-- Comment box functionality. Form component in "article.commentbox.layout.php"-->

<?php
echo "<h2>Comments</h2>";

require PARTIALS . "/article.commentbox.layout.php";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $article_ID = htmlspecialchars($_GET['id'], ENT_QUOTES);
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
            $article_ID = $_GET['id'];

            try {
                //Insert into comments table
                $query4 = "INSERT INTO comments (article_ID, comment_body, created_at) VALUES (?,?,NOW())";

                $statement = $db->prepare($query4);
                $binding = array($article_ID, $comment_body);
                $statement->execute($binding);
                unset($_POST['comment_body']);
            } catch (PDOException $e) {
                $errors[] = "Statement error because: {$e->getMessage()}";
                require VIEWS . '/db_error.html.php';
                exit();
            }
            header('Location: index.php?id='. $article_ID);
            exit();
        } else {
            // header('Location: index.php?upload');
            require VIEWS . '/db_error.html.php';
            exit();
        }
    }
    
    require PARTIALS . "/article.d.comments.php";
    exit();
}
?>