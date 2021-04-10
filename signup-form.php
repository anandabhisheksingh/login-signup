<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>

<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="login-styles.css">

	<!-- Javascript validation for user inputs -->
	<script type="text/javascript">
		function validate() {

			var username = document.getElementById("username").value;
			var password = document.getElementById("password").value;
			var name = document.getElementById("name").value;
			var email = document.getElementById("email").value;

			if (username == null || username == "") {
				alert("Username can't be blank");
				return false;
			} else if (password == null || password == "") {
				alert("Password can't be blank");
				return false;
			} else if (name == null || name == "") {
				alert("Name can't be blank");
				return false;
			} else if (email == null || email == "") {
				alert("Email can't be blank");
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
					<h3>Create Account</h3>
				</div>

				<?php
				if (isset($_GET['error'])) {
					if ($_GET['error'] == 'emptyfields') {
						echo '<p class="closed">*Fill In All The Fields</p>';
					} else if ($_GET['error'] == 'invalid-email') {
						echo '<p class="closed">*Please enter a valid email</p>';
					} else if ($_GET['error'] == 'invalid-username') {
						echo '<p class="closed">*Please enter a valid user name</p>';
					} else if ($_GET['error'] == 'sqlerror') {
						echo '<p class="closed">*Website Error: Contact admin to have the issue fixed</p>';
					} else if ($_GET['error'] == 'usertaken') {
						echo '<p class="closed">*User exist with this username</p>';
					}
				} else if (isset($_GET['signup']) == 'success') {
					echo '<p class="open">*Signup Successful.</p>';
				}
				?>

				<div class="card-body">
					<form id="sign-up-form" method="post" action="signup.php" onsubmit="return validate();">
						<!-- Username -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="username" id="username" class="form-control" placeholder="Username">
						</div>
						<!-- Password -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password">
						</div>
						<!-- Name -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="name" id="name" class="form-control" placeholder="Name">
						</div>
						<!-- Email -->
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="email" id="email" class="form-control" placeholder="Email ID">
						</div>
						<div class="form-group">
							<input type="submit" value="Sign Up" name="signup-submit" class="btn btn-primary btn-block">
						</div>
					</form>
				</div>

				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Have an account?<a href="login-form.php">Log In</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>