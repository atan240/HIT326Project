<?php

$hostname = "localhost";  
$username = "Ben";  
$password = "";  
$database = "newspaper_db";  

// Establish a database connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// Retrieve the top five newest articles
$query = "SELECT article_content.*, users.username
          FROM article_content
          JOIN users ON article_content.user_id = users.user_id
          ORDER BY article_content.news_timestamp DESC
          LIMIT 5";
$result = $db->query($query);

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style-home.css">
</head>
<body>
    <?php require PARTIALS . "/site.header.layout.php"; ?>

    <div class="articles-container">
        <?php
        // Display the top five newest articles
        // if ($result->num_rows > 0) {
        //     while ($article = $result->fetch_assoc()) {
        //         echo "<div class='article'>";
        //         echo "<div class='article-image'><img src='{$article['image_url']}' alt='Article Image'></div>";
        //         echo "<div class='article-content'>";
        //         echo "<h2>{$article['title']}</h2>";
        //         echo "<p>Journalist: {$article['username']}</p>";
        //         echo "<p>Date: {$article['created_at']}</p>";
        //         echo "<p>Tags: {$article['tags']}</p>";
        //         echo "<p>{$article['content']}</p>";
        //         echo "</div>";
        //         echo "</div>";
        //     }
        // } else {
        //     echo "No articles found.";
        // }
        if (!empty($result)) {
            foreach ($result as $article) {
                echo "<div class='article'>";
                echo "<div class='article-image'><img src='{$article['image_url']}' alt='Article Image'></div>";
                echo "<div class='article-content'>";
                echo "<h2>{$article['news_title']}</h2>";
                echo "<p>Journalist: {$article['user_ID']}</p>";
                echo "<p>Date: {$article['news_timestamp']}</p>";
                // echo "<p>Tags: {$article['tags']}</p>";
                echo "<p>{$article['news_body']}</p>";
                echo "<a href='http://localhost/index.php?id={$article['article_ID']}'>Read More</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No articles found.";
        }
        ?>
    </div>

    <?php require PARTIALS . "/site.footer.layout.php"; ?>
</body>
</html>
