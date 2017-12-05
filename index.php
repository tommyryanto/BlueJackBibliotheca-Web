<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bluejack Bibliotheca - LOGIN</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
	
	<?php
		session_unset();
		session_destroy();
	?>

	<h1>Login Page</h1>
	<form action="home.php">
		Username: 
		<input type="text" name="Username" placeholder="Enter Username here..." required> <br>
		<label><input type="checkbox" required name="agreement"> I Agree to the Terms and Conditions <br></label>
		<BUTTON>LOGIN</BUTTON>
	</form>
</body>
</html>