<!--
@author: Darwin Machado
@id: 2948811
@date: 2019
@content: Add new student  - Assigment 02
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
					<h3> Student Registration Form </h3>
					<?php
									//variables
									$std_id = ""; $firstname = ""; $surname = ""; $city =""; $postcode =""; $phone="";
									$state=""; $email = ""; $address = ""; $dob = ""; $country=""; $gender = ""; $errors = array();				
									
									//validate input
									function prepare_input($data) {
										$data = trim($data);
										//$data = stripslashes($data);
										$data = htmlspecialchars($data);
										return $data;
									}

									//Get data from the user and validate it
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
											//Firstname
											if (empty($_POST["firstname"])) {
												array_push($errors, "Firstname is required");
											} 	
											else {
												$firstname = prepare_input($_POST["firstname"]);
											}
											//Surname
											if (empty($_POST["surname"])) {
												array_push($errors, "Surname is required");
											} 	
											else {
												$surname = prepare_input($_POST["surname"]);
											}
											//DOB
											if (empty($_POST["dob"])) {
												array_push($errors, "Date of birth is required");
											} 	
											else {
												$dob = prepare_input($_POST["dob"]);
											}
											//Gender
											if (empty($_POST["gender"])) {
												array_push($errors, "Gender is required");
											} 	
											else {
												$gender = prepare_input($_POST["gender"]);
											}
											//Email
											if (empty($_POST["email"])) {
												array_push($errors, "Email is required");
											} 	
											else {
												$email = prepare_input($_POST["email"]);
												if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
												{
													array_push($errors, "Invalid email format"); 
												}
											}
											//Phone
											if (empty($_POST["phone"])) {
												array_push($errors,"Phone is required");
											} 	
											else {
												$phone = prepare_input($_POST["phone"]);
											}
											//Address
											if (empty($_POST["address"])) {
												array_push($errors,"Address is required");
											} 	
											else {
												$address = prepare_input($_POST["address"]);
											}
											//City
											if (empty($_POST["city"])) {
												array_push($errors,"Address is required");
											} 	
											else {
												$city = prepare_input($_POST["city"]);
											}
											//Postcode
											if (empty($_POST["postcode"])) {
												array_push($errors,"Address is required");
											} 	
											else {
												$postcode = prepare_input($_POST["postcode"]);
											}
											//State
											if (empty($_POST["state"])) {
												array_push($errors,"Address is required");
											} 	
											else {
												$state = prepare_input($_POST["state"]);
											}
											//Country
											if (empty($_POST["country"])) {
												array_push($errors,"Address is required");
											} 	
											else {
												$country = prepare_input($_POST["country"]);
											}
											
											echo '<span class="error">';
											foreach($errors as $error){
												echo $error . "<br />";
											}
											echo '</span>';
												
											if (empty($errors))
											{
												// Register the user in the database...
												require ('mysqli_connect.php'); // Connect to the db
			
												// Make query data save
												$firstname = mysqli_real_escape_string($dbc, trim($firstname));
												$surname = mysqli_real_escape_string($dbc, trim($surname));
												$dob = mysqli_real_escape_string($dbc, trim($dob));
												$gender = mysqli_real_escape_string($dbc, trim($gender));
												$email = mysqli_real_escape_string($dbc, trim($email));
												$phone = mysqli_real_escape_string($dbc, trim($phone));
												$address = mysqli_real_escape_string($dbc, trim($address));
												$city = mysqli_real_escape_string($dbc, trim($city));
												$postcode= mysqli_real_escape_string($dbc, trim($postcode));
												$state=  mysqli_real_escape_string($dbc, trim($state));
												$country =	mysqli_real_escape_string($dbc, trim($country));	
												
												// Make the insert query
												$q = "INSERT INTO student (student_id, first_name, surname,dob, gender, email, phone, address,city, post_code,state, country, registration_date)
												VALUES ('0', '$firstname', '$surname ', '$dob', '$gender','$email','$phone','$address','$city','$postcode','$state','$country', NOW() )";		
												
												// Run the query.
												$r = @mysqli_query ($dbc, $q); 
												
												if ($r) { // If it ran OK.
													// Print a message:
													echo '<h1>Thank you! You are now registered.</h1>';	
												} else { // If it did not run OK.			
													// Public message:
													echo '<h1>System Error</h1>
													<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
											
													// Debugging message: Don't do this in a live website
													echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';	
												} 
												// Close the database connection.
												mysqli_close($dbc); 
												// quit the php script 
												exit(); 
											}else{
												echo '<h1>Error!</h1>
												<p>The following error(s) occurred:<br />';
												// Print each error.
												foreach ($errors as $msg) { 
													echo " - $msg <br />";
												}
												echo '</p><p>Please try again.</p><br />';
											}
									}
?>
				<form action ="add_std.php" method ="POST">
						
						<label for = "firstname"> First name: </label> <br/>
						<input type = "text" name= "firstname" id = "firstname" placeholder="First name..."S />  <br/>
						
						<label for = "surname"> Surname: </label> <br/>
						<input type = "text" name= "surname" id = "surname" placeholder="Surname..."/>  <br/>
						
						<label for = "DOB"> DOB: </label> <br>
						<input type = "date" name= "dob" id = "dob" />  <br><br/>
						
						<label for = "gender"> Gender: </label> <br> <br>
						<label class="container">Male
						<input type="radio" checked="checked" name="gender" value="M">
						<span class="checkmark"></span>
						</label>
						<label class="container">Female
						<input type="radio" name="gender" id="other" value="F">
						<span class="checkmark"></span>
						</label>
						<label class="container">Other
						<input type="radio" name="gender" id="other" value="O">
						<span class="checkmark"></span>
						</label> <br>
					
						<label for = "email"> Email: </label> <br>
						<input type = "email" name= "email" id = "email" placeholder="Email...."   /> <br>
						
						<label for = "phone"> Phone: </label> <br/>
						<input type = "text" name= "phone" id = "phone" placeholder="Phone...." />  <br/>
						
						<label for="address" > Address: </label> <br/> 
						<textarea id ="address" name="address" placeholder="Address...." rows="5"> </textarea><br/>
						
						<label for = "city"> City: </label> <br/>
						<input type = "text" name= "city" id = "city" placeholder="City..."/>  <br/>
						
						<label for = "postcode"> Post code: </label> <br/>
						<input type = "text" name= "postcode" id = "postcode" placeholder="Post code..."/>  <br/>
						
						<label for = "state"> State: </label> <br/>
						<input type = "text" name= "state" id = "state" placeholder="State..."/>  <br/>
						
						<label for = "country"> Country: </label> <br/>
						<input type = "text" name= "country" id = "country" placeholder="Country..."/>  <br/>
						
						<input type="submit" value ="SAVE"> <br><br>
				</form>
				</div>
		</article>
	</section>	
 </body>
 </html> 

