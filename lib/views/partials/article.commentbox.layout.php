<!-- Form component for "article.c.commentbox.php" -->

<?php
$articleID = $_GET['id'];
echo "<form id='comment-box' class='form-container' action='index.php?id=$articleID' method='POST'>
        <input type='hidden' name='_method' value='post' />
        <div><label for='comment_body'>Add your comment</label></div>
        <div><textarea id='comment_body' name='comment_body' placeholder='Enter comment here' style='height:200px'></textarea></div>
        <div><input type='submit' value='Submit comment' /></div>
    </form>";
?>
