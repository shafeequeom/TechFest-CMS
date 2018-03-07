
<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['username'])){
header("location:index.php");
}
include('db.php');

	$query=mysql_query("SELECT * FROM events");

?>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Grid Item Animation Layout - Demo 1</title>
		<meta name="description" content="A responsive, magazine-like website layout with a grid item animation effect when opening the content" />
		<meta name="keywords" content="grid, layout, effect, animated, responsive, magazine, template, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style1.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>
			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>
				<div class="codrops-links">
					
      <img src="../assets/images/logo.png" width="225" height="206"></div>
				<h1><span>Advay 2016</h1>
				<nav class="codrops-demos"></nav>
				<div class="related">
					<h3>Caterogies<a href="http://tympanus.net/Development/BookPreview/">Book Preview</a>
					  <a href="http://tympanus.net/Tutorials/ThumbnailGridExpandingPreview/">Thumbnail Grid</a>
					  <a href="http://tympanus.net/Development/3DGridEffect/">3D Grid Effect</a>				    </h3>
                <a href="http://tympanus.net/Development/BookPreview/"></a> </div>
			</div>
			<div id="theGrid" class="main">
				<section class="grid">
					<header class="top-bar">
						<h2 class="top-bar__headline">Latest articles</h2>
						<div class="filter">
							<span>Filter by:</span>
							<span class="dropdown">Popular</span>
						</div>
					</header>
             
               
                <?php
                      while ($row = mysql_fetch_array($query)) {
				  echo '<a class="grid__item" href="#"> ';
						 echo '<h2 class="title title--preview">'.$row[1].'</h2>';
						 echo '<div class="loader"></div>';
						 echo '<span class="category">Stories for humans</span>';
						 echo '<div class="meta meta--preview">';
							 echo '<img class="meta__avatar" src="img/authors/1.png" alt="author01" /> ';
							 echo '<span class="meta__date"><i class="fa fa-calendar-o"></i> 9 Apr</span>';
							 echo '<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>';
						 echo "</div>";
					 echo "</a> ";
					           }
                ?> 
					<footer class="page-meta">
						<span>Load more...</span>
					</footer>
				</section>
				<section class="content">
					<div class="scroll-wrap">
                                    <?php
                      while ($row = mysql_fetch_array($query)) {
						echo '<article class="content__item">';
							echo '<span class="category category--full">Stories for humans</span>';
							echo '<h2 class="title title--full"><?php echo $query[1]; ?></h2>';
							echo '<div class="meta meta--full">';
								echo '<img class="meta__avatar" src="img/authors/1.png" alt="author01" />';
								echo '<span class="meta__author">Matthew Walters</span>';
								echo '<span class="meta__date"><i class="fa fa-calendar-o"></i> 9 Apr</span>';
								echo '<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 3 min read</span>';
							echo '</div>';
							echo '.$query[2].';
						echo '</article>';
										           }
                ?> 
					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
				</section>
			</div>
		</div><!-- /container -->


	<script src="js/classie.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
