<!-- Retrieves the main article body. -->

<?php
//Select statement retrieves values from "article_content" table as well as the journalist's full name from the "users" table
if (isset($_GET['id']) && !empty($_GET['id'])) {

    if ($statement = $db->prepare("SELECT ac.article_ID, ac.news_title, ac.news_body, ac.news_timestamp, u.user_FN, u.user_LN, ac.image_url 
        FROM article_content ac 
        LEFT JOIN users u on u.user_ID = ac.user_ID
        WHERE ac.article_ID = ?")) {

        // //Value in the binding array specifies the article ID
        $articleID = array($_GET['id']); //'id'?
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

                $journalist_name = ($user_FN && $user_LN) ? $user_FN . ' ' . $user_LN : "Unknown author";
                echo "<article><header><h1>$news_title</h1>";
                echo "<p class='meta-data'>$journalist_name  |  $news_timestamp</p></header>";
                echo "<p><center><img src='$image_url'></center></p>";
                echo "<p>$news_body</p></article>";
            }
        } else {
            require VIEWS . '/db_error.html.php';
        }
    } else {
        require VIEWS . '/db_error.html.php';
    }
}
?>