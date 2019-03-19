<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Griffith College </title>
	<link rel="stylesheet" href="style.css" />
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
				<li><a class="link-1" href="delete_std.php"><i class='material-icons'>delete</i></a></li>
				<li><a class="link-1" href="update_std.php"><i class='material-icons'>update</i></a></li>
			</ul>
		</nav>
		<article>
				<div class= "section-1">
					<h1> Griffith College - dashboard </h1>
				</div>
				<div class= "section-2">
					<h3> Currently Students </h3>
					<table class= "myTable">
						 <thead>
								<tr>
									<th>Student ID</th>
									<th>Firstname</th>
									<th>Surname</th>
									<th>DOB </th>
							
								</tr>
						</thead>
						<tbody>
								<?php 
								
									// Connect to the db.
									require ('mysqli_connect.php'); 
									
									//Make the query:
									$q = "SELECT first_name, last_name, registration_date AS dr FROM users ORDER BY registration_date ASC";		
									
									// Run the query.
									$r = @mysqli_query ($dbc, $q); 
									
									
									if($r) {
										//Count th number of returned rows:
										$num = mysqli_num_rows($r);
										if ($num>0){
											while($row = mysqli_fetch_array($r)){
												print("
												<tr>
												  <td>$file_name</td>
												  <td>$size</td>
												  <td sorttable_customkey='$timekey'>$modtime</a></td>
												  <td><a href='read_file.php?file=$filename' class='btn'><i class='material-icons'>description</i></a></td>
												  <td><a href='edit_file.php?file=$filename' class='btn'><i class='material-icons'>edit</i></a> </td>
												  <td><a href='delete_file.php?file=$filename' class='btn'><i class='material-icons'>delete</i></a></td>
												  </td>
												</tr>");
											}
										}else{
											echo "There are no employees in the database<br/>";
										}
											
											// Free up the resources.	
											mysqli_free_result ($r); 
									} else {
											// Public message:
											echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
											
											// Debugging message:
											echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
											
									}
									
									// Close the database connection.
									mysqli_close($dbc);
						
								?>	
						</tbody>
						</table>
									</div>
		</article>
	</section>	
 </body>
 </html> 

