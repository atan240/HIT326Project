<?php
// Database connection and authentication code
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'databaseproject';

// Create a connection to the database
$connection = new mysqli($hostname, $username, $password, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve the top five newest articles
$query = "SELECT articles.*, users.username
          FROM articles
          JOIN users ON articles.author_id = users.id
          ORDER BY articles.created_at DESC
          LIMIT 5";
$result = $connection->query($query);
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
        if ($result->num_rows > 0) {
            while ($article = $result->fetch_assoc()) {
                echo "<div class='article'>";
                echo "<div class='article-image'><img src='{$article['image_url']}' alt='Article Image'></div>";
                echo "<div class='article-content'>";
                echo "<h2>{$article['title']}</h2>";
                echo "<p>Journalist: {$article['username']}</p>";
                echo "<p>Date: {$article['created_at']}</p>";
                echo "<p>Tags: {$article['tags']}</p>";
                echo "<p>{$article['content']}</p>";
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

<?php
// Close the database connection
$connection->close();
?>
