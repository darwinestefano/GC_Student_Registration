
<!--
@author: Darwin Machado
@id: 2948811
@date: 2019
@content: Delete student  - Assigment 02
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Griffith College </title>
	<link rel="stylesheet" href="styles.css" />
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin|Rajdhani|Great+Vibes|Anton|Francois+One|Playfair+Display+SC" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
 <body>
	<header>
				<img src="images/gc-logo.png" alt="logo">
	</header>
	<section>
		<nav>
			<ul>
				<li><a class="link-1" href="index.php"><i class='material-icons'>home</i></a></li>
				<li><a class="link-1" href="add_std.php"><i class='material-icons'>add</i></a></li>
				<li><a class="link-1" href="search_std.php"><i class='material-icons'>search</i></a></li>
				<!--
				<li><a class="link-1" href="delete_std.php"><i class='material-icons'>delete</i></a></li>
				<li><a class="link-1" href="update_std.php"><i class='material-icons'>update</i></a></li>
				-->
			</ul>
		</nav>
		<article>
				<div class= "section-1">
					<h1> Griffith College - dashboard </h1>
				</div>
				<div class= "section-2">
					<h3> Remove student </h3>
							<?php 
								//Search student passing Id through URL
								if ($_SERVER["REQUEST_METHOD"] == "GET") {
									
									//Get input from user 
									$search = $_GET ["id"];
									
									// Connect to the db.
									require ('mysqli_connect.php'); 
									
									//Make the query:
									$q = "DELETE FROM student WHERE  first_name = '$search'";	
									
									// Run the query.
									$r = @mysqli_query ($dbc, $q); 
									
									if($r) {
										echo "<h1>Student deleted successfully <h1> <br/>";
									
									}else{
										echo "Sorry, student cannot be removed<br/>";
									}
									// Close the database connection.
											mysqli_close($dbc);
										exit();
								} else {
											// Public message:
											echo '<p class="error">The current student could not be retrieved. We apologize for any inconvenience.</p>';
											
											// Debugging message:
											echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
											// Close the database connection.
										mysqli_close($dbc);
								}
							?>
				</div>
			</article>
		</section>	
	</body>
 </html> 