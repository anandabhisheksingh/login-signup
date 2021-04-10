<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="login-styles.css">

	<!-- Javascript validation for user inputs -->
	<script type="text/javascript">
		function validate() {

			var email = document.getElementById("email").value;
			var password = document.getElementById("password").value;

			if (email == null || email == "") {
				alert("Username can't be blank");
				return false;
			} else if (password == null || password == "") {
				alert("Password can't be blank");
				return false;
			}
		}
	</script>
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Sign In</h3>
				</div>

				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'emptyfields') {
						echo '<p class="closed">*Fill In All The Fields</p>';
					} else if ($_GET['error'] == 'sqlerror') {
						echo '<p class="closed">*Website Error: Contact admin to have the issue fixed</p>';
					} else if ($_GET['error'] == 'invalid-email') {
						echo '<p class="closed">*Invalid email id</p>';
					} else if ($_GET['error'] == 'wrong-credential') {
						echo '<p class="closed">*Wrong email or password</p>';
					}
				}
				?>

				<div class="card-body">
					<form id="login-form" method="post" action="login.php" onsubmit="return validate();">
						<!-- Email -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" id="email" class="form-control" placeholder="Email Id">
						</div>
						<!-- Password -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<input type="submit" value="Login" name="login-submit" class="btn btn-primary btn-block">
						</div>
					</form>
				</div>

				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="signup-form.php">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>