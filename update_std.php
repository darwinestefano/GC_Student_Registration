<!--
@author: Darwin Machado
@id: 2948811
@date: 2019
@content: Update student  - Assigment 02
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
					<h3> Upadate currently Student </h3>
					
					<?php
									//variables
									$std_id = ""; $firstname = ""; $surname = ""; $city =""; $postcode =""; $phone="";
									$state=""; $email = ""; $address = ""; $dob = ""; $country=""; $gender = ""; $std_id= "" ;$errors = array();				
									
									//validate input
									function prepare_input($data) {
										$data = trim($data);
										//$data = stripslashes($data);
										$data = htmlspecialchars($data);
										return $data;
									}
									
									//Get data from the user and validate it
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
											
											//student ID
											if (empty($_POST["std_id"])) {
												array_push($errors, "ID is required");
											} 	
											else {
												$std_id = prepare_input($_POST["std_id"]);
											}
											
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
												$std_id = mysqli_real_escape_string($dbc, trim($std_id));
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
												$q = "UPDATE student SET 
													first_name =  '$firstname',
													surname= '$surname',
													dob = '$dob',
													gender= '$gender',
													email='$email', 
													phone='$phone', 
													address='$address',
													city='$city', 
													post_code='$postcode', 
													state='$state',
													country='$country' 
													WHERE student_id ='$std_id'";		
												
												// Run the query.
												$r = @mysqli_query ($dbc, $q); 
												
														if ($r) { // If it ran OK.
															// Print a message:
															echo '<h1>Thank you! Student now updated.</h1>';	
														} else { // If it did not run OK.			
															// Public message:
															echo '<h1>System Error</h1>
															<p class="error">Student cannot be updated due to a system error. We apologize for any inconvenience.</p>'; 
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
						 <?php
						 if ($_SERVER["REQUEST_METHOD"] == "GET") {
										
										// Get Id from URL	
										$search = $_GET ["id"];
									
										// Connect to the db.
										require ('mysqli_connect.php'); 
										
										//Make the query:
										$q = "SELECT * FROM student WHERE  student_id = '$search';";	
										
										// Run the query.
										$r = @mysqli_query ($dbc, $q); 
										if($r){
											$num = mysqli_num_rows($r);
												if ($num>0){
													while ($row = mysqli_fetch_array($r))
													{
														/* $firstname = $row['first_name']; 
														$surname = $row['surname']; 
														$dob =$row['dob'];
														$gender = $row['gender'];
														$email = $row['email']; 
														$phone=$row['phone'];
														$address = $row['address']; 
														$city =$row['city'];
														$postcode =$row['post_code']; 
														$state=$row['state'];
														$country=$row['country']; */
									
						 ?>
						<form action ="update_std.php" method ="POST">
						
						<label for = "std_id"> Student Id: </label> <br/>
						<input type = "text" name= "std_id" id="std_id"  readonly value="<?php echo $row ['student_id']; ?>"/>  <br/>
						
						<label for = "firstname"> First name: </label> <br/>
						<input type = "text" name= "firstname" id = "firstname" placeholder="First name..." value="<?php echo $row ['first_name']; ?>"/>  <br/>
						
						<label for = "surname"> Surname: </label> <br/>
						<input type = "text" name= "surname" id = "surname" placeholder="Surname..."  value="<?php echo $row ['surname']; ?>"/>  <br/>
						
						<label for = "DOB"> DOB: </label> <br>
						<input type = "date" name= "dob" id = "dob"  value="<?php echo $row ['dob']; ?>"/>  <br><br/>
						
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
						</label> <?php echo $row ['gender']; ?>"/>  <br>
					
						<label for = "email"> Email: </label> <br>
						<input type = "email" name= "email" id = "email" placeholder="Email...."  value="<?php echo $row ['email']; ?>"  /> <br>
						
						<label for = "phone"> Phone: </label> <br/>
						<input type = "text" name= "phone" id = "phone" placeholder="Phone...."  value="<?php echo $row ['phone']; ?>" />  <br/>
						
						<label for="address" > Address: </label> <br/> 
						<textarea id ="address" name="address" placeholder="Address...." rows="5" ><?php echo $row ['address']; ?></textarea> <br/>
						
						<label for = "city"> City: </label> <br/>
						<input type = "text" name= "city" id = "city" placeholder="City..." value="<?php echo $row ['city']; ?>"/>  <br/>
						
						<label for = "postcode"> Post code: </label> <br/>
						<input type = "text" name= "postcode" id = "postcode" placeholder="Post code..."  value="<?php echo $row ['post_code']; ?>"/>  <br/>
						
						<label for = "state"> State: </label> <br/>
						<input type = "text" name= "state" id = "state" placeholder="State..."  value="<?php echo $row ['state']; ?>"/>  <br/>
						
						<label for = "country"> Country: </label> <br/>
						<input type = "text" name= "country" id = "country" placeholder="Country..."  value="<?php echo $row ['country']; ?>"/>  <br/>
						
						<input type="submit" value ="SAVE"> <br><br>
				</form>
					<?php
									}
								}
							}
										
						}
					?>
				</div>
		</article>
	</section>	
 </body>
 </html> 

