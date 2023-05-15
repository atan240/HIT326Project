<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>National Australia Times Website</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>National Australia Times</h1>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Search</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Login</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<article>
			<header>
				<h2>[Article Title]</h2>
				<p class="meta-data">By [Journalist] | [Date] | [Time]</p>
			</header>
			<p>[Article Body]</p>
			<a href="#">Read More</a>
		</article>
	</main>
    <div data-role='page'>

<div data-role='content'>

  <?php 
  require VIEWS."/{$content}.php";
  ?>

</div> <!-- end id=content -->


</div> <!-- end id=page -->
	<footer>
		<p>&copy; 2023 National Australia Times</p>
	</footer>
</body>
</html>