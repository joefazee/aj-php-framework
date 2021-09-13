<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Books</title>

	<style>
		.container {
			width: 60vw;
			margin:  0 auto;
		}

		.book-list{
			display: grid;
			grid-template-columns: 1fr 1fr 1fr 1fr;
			grid-gap: 10px;
		}
		.book-items{
			width: 200px;
			background-color: aqua;
			height: 200px;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>

<div class="container">

	<div class="book-list">
		<?php foreach($books  as $book) : ?>
			<div class="book-items">
				<h2><?php echo htmlentities($book->title) ?></h2>
			</div>
		<?php endforeach; ?>
	</div>

</div>

</body>
</html>
