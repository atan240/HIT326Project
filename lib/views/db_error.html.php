<!DOCTYPE html>
<html lang="en">


<body>
<h1>Database error</h1>
<h2>There appears to be a problem with the database</h2>

<?php
  //Print any errors 
  if(!empty($errors)){
     echo "<p>We have errors</p>";
	 echo "<ul>";
	 foreach($errors As $error){
	    echo "<li>{$error}</li>";
	 }
	 echo "</ul>";
  }
?>


</body>
</html>