<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bluejack Bibliotheca - HOME</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <link rel="stylesheet" href="my.css">
</head>
<body>

<?php 
	$Username = $_REQUEST["Username"];

	$_SESSION["Username"] = "$Username";
	if(strlen($Username) < 3){
		echo "<script>
		alert('Input wrong');
		window.location.href='index.php';
		</script>";
	}
	else{
		$connection = mysqli_connect("localhost", "root", "", "userData");
		$query = "INSERT INTO `username` (`Username`) VALUES ('$Username')";
		$connection->query($query);
	}
?>


	<h2 id="HelloText">
		Hello, <?php echo "$Username"; ?>
		<img src="account.png" id="accountImg" width="25" height="35">
	</h2>



		<div data-role="collapsible" data-icon="bullets" class="ui-body-b ui-body" id="menu">
			<h4>Menu</h4>
   		 	<li> 

			<form method="get" action="find.php?">
      	 		<BUTTON>Find Book</BUTTON>
   		 	</li>
   		 	</form>
	 		<li>
	 			<form method="get" action="view.php?book-title=&book-author=&book-genre=">
      	 			<BUTTON>View Borrowing Request</BUTTON>
      	 		</form>
	 		</li>
	 		<li>
	 			<a href="index.php?Username=&agreement=off" data-role="button" data-icon="delete">Logout</a>
	 		</li>
		</div>


<h1 id="textHome">HOME</h1>

	
	
	<table id="table-book" border="1">
		<tr>
			<th class="tabHeader">No.</th>
			<th class="tabHeader">Title</th>
			<th class="tabHeader">Author</th>
			<th class="tabHeader">Genre</th>
			<th id="borrowHeader">Borrow</th>
		</tr>
	</table>

	<!-- $.get('http://mcc-ws-odd1718.herokuapp.com/books.php')
 -->
 	<script src="jquery-3.2.1.min.js"></script>
	<script>
		$.get('http://localhost:80/TM/data-book.php')
		.then(function(result) {
			var table = $('#table-book');
			var books = result.books;
			for (var i = 0; i < books.length; i++) {
				var book = books[i];
				table.append(`
					<tr>
						<td>${i + 1}</td>
						<td>${book.title}</td>
						<td>${book.author}</td>
						<td>${book.genre}</td>

						<td> 
							<form action="view.php?book-title=${book.title}&book-author=${book.author}&book-genre=${book.genre}">
								<button> Borrow </button>
							</form>
						</td>
					</tr>
				`);
			}
		});
	</script>

 </body>
</html>