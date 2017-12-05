<?php

session_start();

$connection = mysqli_connect("localhost:3306", "root", "", "userData");

$search_query = $_SESSION['Username'];
$query_result = $connection->query("SELECT * FROM `userCart` WHERE Username LIKE '%$search_query%' ");

$books = [];
// looping semua data hasil query
while ($data = $query_result->fetch_assoc()) {
	$books[] = $data;
}

header('Content-Type: application/json');
print json_encode($books);

?>