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
    }

    //Select statement retrieves values from "article_content" table as well as the journalist's full name from the "users" table
    // if (isset($_GET['id']) && !empty($_GET['id'])) {
       
        if ($statement = $db->prepare("SELECT ac.article_ID, ac.news_title, ac.news_body, ac.news_timestamp, u.user_FN, u.user_LN, ac.image_url 
        FROM article_content ac 
        JOIN users u on u.user_ID = ac.user_ID
        WHERE ac.article_ID = ?")) {

        //Value in the binding array specifies the article ID
        //  // $binding = array('17'); //'id'?
        $articleID = array($_GET['id']); //'id'?

        // $statement->execute($binding);
        
            // // Bind the 'id' parameter to the statement as an integer
            // $statement->bind_param("i", $_GET['id']);
            // $statement->bind_param($articleID);
        $statement->execute($articleID);
        $result = $statement->fetchall(PDO::FETCH_ASSOC);

        //Check for results
        if (!empty($result)) {
            foreach ($result as $item) {
                $news_title = htmlspecialchars($item['news_title'], ENT_QUOTES, 'UTF-8');
                $news_body = htmlspecialchars($item['news_body'], ENT_QUOTES, 'UTF-8');
                $news_timestamp = htmlspecialchars($item['news_timestamp'], ENT_QUOTES, 'UTF-8');
                $user_FN = htmlspecialchars($item['user_FN'], ENT_QUOTES, 'UTF-8');
                $user_LN = htmlspecialchars($item['user_LN'], ENT_QUOTES, 'UTF-8');
                $image_url = htmlspecialchars($item['image_url'], ENT_QUOTES, 'UTF-8');
                

                echo "<article><header><h1>$news_title</h1>";
                echo "<p class='meta-data'>$user_FN $user_LN  |  $news_timestamp</p></header>";
                echo "<p><center><img src='$image_url'></center></p>";
                echo "<p>$news_body</p></article>";
                echo "<h2>Tags</h2>";

                //Show article tags
                if ($statement = $db->prepare("SELECT tags.tag_name FROM article_content JOIN article_tags ON article_content.article_ID = article_tags.article_ID JOIN tags ON article_tags.tag_ID = tags.tag_ID WHERE article_content.article_ID = ?")) {

                    //Value in the binding array specifies the article ID
                    // $binding = array('17');
                    

                    $statement->execute($articleID);

                    $result = $statement->fetchall(PDO::FETCH_ASSOC);

                    //Check for results
                    if (!empty($result)) {
                        foreach ($result as $item) {
                            $tags = htmlspecialchars($item['tag_name'], ENT_QUOTES, 'UTF-8');
                            echo "<p>#$tags</p>";
                        }
                    } else {
                        require VIEWS . '/db_error.html.php';
                    }
                }

                //Comments box
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
                        header('Location: index.php');

                        exit();
                    } else {
                        // header('Location: index.php?upload');
                        require VIEWS . '/db_error.html.php';
                        exit();
                    }
                }
            }
        } else {
            require VIEWS . '/db_error.html.php';
        }
    }
        // }




    ?>
</main>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>

</html>