<!-- Posting values from article upload form into each respective table in the newspaper database -->

<?php
if (isset($_POST['_method']) && $_POST['_method'] == 'post') {
    // var_dump($_POST);
    if (!empty($_POST['news_title']) && !empty($_POST['user_id']) && !empty($_POST['image_url']) && !empty($_POST['news_body']) && !empty($_POST['tag_name'])) {
        $errors = array();
        require DB;

        $news_title = htmlspecialchars($_POST['news_title'], ENT_QUOTES);
        $user_id = htmlspecialchars($_POST['user_id'], ENT_QUOTES);
        $image_url = htmlspecialchars($_POST['image_url'], ENT_QUOTES);
        $news_body = htmlspecialchars($_POST['news_body'], ENT_QUOTES);
        $tag_name = htmlspecialchars($_POST['tag_name'], ENT_QUOTES);
        $tag_name = str_replace(' ', '', $tag_name); // Remove whitespaces
        $tag_name_array = explode(',', $tag_name);
        try {
            //Insert into article_content table
            $query1 = "INSERT INTO article_content (news_title,user_id,image_url, news_body, news_timestamp) VALUES (?,?,?,?,NOW())";

            $statement = $db->prepare($query1);
            $binding = array($news_title, $user_id, $image_url, $news_body);
            $statement->execute($binding);
            $articleID = $db->lastInsertId();

            //Insert into tags table
            $query2 = "INSERT INTO tags (tag_name) VALUES (?) ON DUPLICATE KEY UPDATE tag_name = VALUES(tag_name)";
            $insertIntoTagsStmt = $db->prepare($query2);

            // Insert tags into tags table, or update existing tags
            foreach ($tag_name_array as $tag_name) {
                $tag_name = htmlspecialchars(trim($tag_name), ENT_QUOTES);
                $insertIntoTagsStmt->execute([$tag_name]);
                $tagIDs[] = $db->lastInsertId();
            }

            // SELECT tag_ID from tags table and INSERT with article_ID into intermediate table "article_tags"
            foreach ($tag_name_array as $tag_name) {
                $tag_name = htmlspecialchars(trim($tag_name), ENT_QUOTES);
                $query3 = "SELECT tag_ID FROM tags WHERE tag_name = ?";
                $statement = $db->prepare($query3);
                $statement->execute([$tag_name]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    $tagID = $result['tag_ID'];
                    $query4 = "INSERT INTO article_tags (article_ID, tag_ID) VALUES (?, ?)";
                    $statement = $db->prepare($query4);
                    $statement->execute([$articleID, $tagID]);
                }
            }
            // Attempt at validating if journalist ID input equals to a journalist ID present in the "users" table
            $query5 = "SELECT user_role FROM users WHERE user_ID = ?";
            $statement = $db->prepare($query5);
            $statement->execute([$user_id]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if ($user && $user['user_role'] !== 'journalist') {
                $error = "Invalid journalist ID";
                require VIEWS . '/db_error.html.php';
                // echo "<script>alert(\"$error\");</script>";
            }
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

?>