<!--
@author: Darwin Machado
@id: 2948811
@date: 2019
@content: index.php  - Assigment 02
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Griffith College </title>
	<link rel="stylesheet" href="stylesheet.css" />
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
					<h3> Currently Students </h3>
					<table class= "myTable">
						 <thead>
								<tr>
									<th>Student ID</th>
									<th>Firstname</th>
									<th>Surname</th>
									<th>DOB</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>City</th>
									<th>Postcode</th>
									<th>State</th>
									<th>Country</th>
									<th>Registration Date</th>
								</tr>
						</thead>
						<tbody>
								<?php 
									// Connect to the db.
									require ('mysqli_connect.php'); 
									
									//Make the query:
									$q = "SELECT student_id, first_name, surname,dob, gender, email, phone, address,city, post_code,state, country, registration_date FROM student ORDER BY student_id ASC";		
									
									// Run the query.
									$r = @mysqli_query ($dbc, $q); 
									
									//if run ok
									if($r) {
										//Count th number of returned rows:
										$num = mysqli_num_rows($r);
										if ($num>0){
											while($row = mysqli_fetch_array($r)){
												print("
												<tr>
												  <td>$row[student_id]</td>
												  <td>$row[first_name]</td>
												  <td>$row[surname]</td>
												  <td>$row[dob]</td>
												  <td>$row[gender]</td>
												  <td>$row[email]</td>
												  <td>$row[phone]</td>
												  <td>$row[address]</td>
												  <td>$row[city]</td>
												  <td>$row[post_code]</td>
												  <td>$row[state]</td>
												  <td>$row[country]</td>
												  <td>$row[registration_date]</td>
												  <td> <a href='update_std.php?id=$row[student_id]' class='btn'><i class='material-icons'>update</i></a> </td>
												  <td> <a href='delete_std.php?id=$row[student_id]' class='btn'><i class='material-icons'>delete</i></a> </td>
												</tr>");
											}
										}else{
											echo "<h3>There are no students registred in the database! <h3><br/>";
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

