<?php 
	session_start();
?>

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
		$Username =$_SESSION["Username"];

		$booktitle = $_REQUEST["book-title"];
		$bookauthor = $_REQUEST["book-author"];
		$bookgenre = $_REQUEST["book-genre"];
		
		if( !($booktitle)=='' ){
			$connection = mysqli_connect("localhost:3306", "root", "", "userData");
			$query = "INSERT INTO `userCart` (`title`, `genre`, `author`, `Username`) VALUES ('$booktitle', '$bookgenre', '$bookauthor', '$Username')";
			$connection->query($query);
		}
	?>

	<h2 id="HelloText">
		Hello, <?php echo "$Username"; ?>
		<img src="account.png" id="accountImg" width="25" height="35">
		</h2>
	<div data-role="collapsible" data-icon="bullets" class="ui-body-b ui-body">
		
		<h4>Menu</h4>
		<li>
			<form method="get" action="home.php?Username=<?php echo "$Username"; ?>">
    		<button>Home</button>
			</form>
		</li>
   	 	<li> 
   	 		<form method="get" action="find.php">
    			<button>Find Book</button>
			</form>
   	 	</li>
		<li><a href="index.php?Username=<?php echo "$Username"; ?>" data-role="button" data-icon="delete">Logout</a></li>
	</div>
	
	<table id="table-book" border="1">
		<tr>
			<th class="tabHeader">No.</th>
			<th class="tabHeader">Title</th>
			<th class="tabHeader">Author</th>
			<th class="tabHeader">Genre</th>
			<th class="tabHeader">Remove</th>
		</tr>
	</table>

	<script src="jquery-3.2.1.min.js"></script>

	<script>
		$.get('http://localhost:80/TM/view-book.php')
		.then(function(result) {
			var table = $('#table-book');
			var books = result;
			var count = 0;
			for (var i = 0; i < books.length; i++) {
				var book = books[i];
				table.append(`
					<tr>
						<td>${i + 1}</td>
						<td>${book.title}</td>
						<td>${book.genre}</td>
						<td>${book.author}</td>
						<td>
							<form action="remove.php?title=${book.title}&genre=${book.genre}&author=${book.author}">
								<button> REMOVE </button>
							</form>
						</td>
					</tr>
				`);		
			}
		});
	</script>	
			
</body>
</html>