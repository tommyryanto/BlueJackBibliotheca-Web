<?php
	$books =[];
	$json = json_decode(file_get_contents("http://mcc-ws-odd1718.herokuapp.com/books.php"));
	$books = $json;
	header('Content-Type: application/json');
	print json_encode($books);
?>