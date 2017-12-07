<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bluejack Bibliotheca - FIND BOOK</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php 
		$Username = $_SESSION["Username"];
	?>

	<h2 id="HelloText">
		Hello, <?php echo "$Username"; ?>
		<img src="account.png" id="accountImg" width="25" height="35">
		</h2>

	<div data-role="collapsible" data-icon="bullets" class="ui-body-b ui-body">
		<h4>Menu</h4>
		<li>
			<form method="get" action="home.php">
    		<button>Home</button>
			</form>
		</li>
   	 	<li>
   	 		<form method="get" action="view.php">
    			<button>View Borrowing Request</button>
			</form>
   	 	</li>
		<li><a href="index.php?" data-role="button" data-icon="delete">Logout</a></li>
	</div>

	<form action="javascript:search();">
		<input type="text" id="inputSearch" placeholder="Search here..."></input>
		<button>SEARCH</button>
	</form>

	<table id="search" border="1">
		<tr>
			<th class="tabHeader">Title</th>
			<th class="tabHeader">Author</th>
			<th class="tabHeader">Genre</th>
			<th id="borrowHeader">Borrow</th>
		</tr>
	</table>

	<script>
		function search(){
		$.post('http://localhost:80/TM/data-book.php')
		.then(function(result) {
			var search = $('#search');
			var books = result.books;
			for (var i = 0; i < books.length; i++) {
				var book = books[i];
				if(book.title == document.getElementById("inputSearch").value)
				search.append(`
					<tr>
						<td>${book.title}</td>
						<td>${book.author}</td>
						<td>${book.genre}</td>
						<td>
							<form action="view.php?book-title=${book.title}&book-author=${book.author}&book-genre=${book.genre}">
								<button>BORROW</button
							</form>
						</td>
					</tr>
				`);
			}
		});
	}
	</script>

</body>
</html>