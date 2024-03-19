<?php
session_start();
include('../config/dbconnect.php');

include('./header.php');
if (isset($_POST['register'])) {

	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$adding_user_query = "INSERT INTO users (`username`, `email`, `password`)  VALUES ('$username', '$email', '$password')";


	if (mysqli_query($connection, $adding_user_query)) {
		echo ("<h1>User added</h1>");
		$res = mysqli_query($connection, "SELECT * FROM users WHERE `password` = '$password'");
		$row = mysqli_fetch_assoc($res);

		$id = $row['id'];

		$_SESSION['id'] = $id;
	}
}
if ($_SESSION['id'] == $id) {
	header('Location:../index.php');
}

?>
<a href="../index.php" class="btn blue darken-4"><i class="material-icons">arrow_back</i></a>
<div class="container login center" style="display: flex; flex-direction: column; place-items: center; min-height: 97.5vh; min-width: 90vw; padding-inline: none;margin-top: 8em;">
	<h2>Create a new account</h2>
	<div class="row">
		<div class="col s12 m9 l8 z-depth-2 valign-wrapper center" style="width: 50vw; height: 40vh; padding:1em">
			<form action="./register.php" method="post" style="width: 100%;">
				<div class="input-field">
					<i class="material-icons prefix">person</i>
					<input type="text" name="username" id="username" required="Please Enter username">
					<label for="username">Username</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">email</i>
					<input type="email" name="email" id="email" required="Please Enter email ">
					<label for="email">Email</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">password</i>
					<input type="password" name="password" id="password" required="Please Enter password">
					<label for="password">Password</label>
					<span class="right" id="passToggle" onclick="togglePasswordVisibility()" style="position: relative; top: -3em; cursor: pointer;
					"><i class="material-icons grey-text">visibility</i></span>
				</div>
				<div class="input-field">
					<input type="submit" class="btn blue darken-4" value="REGISTER" name="register">
				</div>
				<p>Click
					<a href="./login.php">here</a> if you already have an account
				</p>
			</form>
		</div>
	</div>

</div>
<?php
include('./togglePassword.php');
include('./footer.php');
