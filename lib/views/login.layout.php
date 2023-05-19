<?php
require PARTIALS . "/site.header.layout.php";
?>
<!DOCTYPE html>
<html lang="en">
<body>
<h1>Login</h1>
<form action='index.php' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <label for='name'>Name</label>
 <input type='text' id='name' name='name' />
 <label for='password'>Password</label>
 <input type='password' id='password' name='password' />
 <input type='submit' value='Sign in' />
</form>
<?php
require PARTIALS . "/site.footer.layout.php";
?>
</body>
</html>

