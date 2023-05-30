<!DOCTYPE html>
<html lang="en">

<?php
require PARTIALS . "/site.header.layout.php";
?>

<body>
    <h1>Create Article</h1>
<form id="my-form" class="form-container" action='index.php?upload' method="POST">
    <div><input type='hidden' name='_method' value='post' /></div>
    <div><label for='title'>Title</label></div>
    <div><input type='text' id='news_title' name='news_title' /></div>
    <div><label for='journalist'>Journalist ID</label></div>
    <div><input type='text' id='user_id' name='user_id' /></div>
    <div><label for='image'>Image (Insert URL)</label></div>
    <div><input type='text' id='image_url' name='image_url' /></div>
    <div><label for='news'>Article Content</label></div>
    <div><textarea id="news_body" name="news_body" placeholder="Enter content here" style="height:200px"></textarea></div>
    <div><label for='tags'>Article tags (separate with comma)</label></div>
    <div><input type='text' id='tag_name' name='tag_name' /></div>
    <div id="error-container"></div><br> <!-- Error container -->
    <div><input type='submit' value='Submit article' /></div>
</form>
    <?php
    require PARTIALS . "/site.footer.layout.php";
    ?>
<script src="/js/form-validation.js"></script>
</body>

</html>
