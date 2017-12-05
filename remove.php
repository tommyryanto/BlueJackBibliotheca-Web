<!DOCTYPE html>
<html>
<head>
	<title>Bluejack Bibliotheca - VIEW BORROWING BOOK</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
</head>
<body>
	<?php
		$title = $_REQUEST["title"];
		$genre = $_REQUEST["genre"];
		$author = $_REQUEST["author"];

		$connection = mysqli_connect("localhost", "root", "", "userData");
		$query = "DELETE FROM `userCart` WHERE `userCart`.`title` = '$title', `userCart`.`genre`= '$genre' , `userCart`.`author` = '$author'";
		$connection->query($query);
	?>


</body>
</html>