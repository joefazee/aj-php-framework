<?php  include_template('partials/header.php'); ?>
<body>
<?php  include_template('partials/nav.php'); ?>
<div class="container">
	<main class="form-signin" style="max-width: 400px">
		<form method="post" action="/login">
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
			<div class="form-floating">
				<input type="text" name="identity" class="form-control" id="floatingInput" placeholder="name@example.com">
				<label for="floatingInput">Email address</label>
			</div>
			<div class="form-floating">
				<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
				<label for="floatingPassword">Password</label>
			</div>

			<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
		</form>
	</main>

</div>

<?php  include_template('partials/footer.php'); ?>
