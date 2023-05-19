<?php
require PARTIALS . "/site.header.layout.php";
?>
<!DOCTYPE html>
<html lang="en">
<body>
<h1>Create Article</h1>
<form action='index.php' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <label for='name'>Title</label>
 <input type='text' id='Title' name='title' />
 <input type='submit' value='Submit article' />
</form>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>

