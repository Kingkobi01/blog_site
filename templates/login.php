<?php
include('./header.php');

session_start();
?>

<a href="../index.php" class="btn blue darken-4"><i class="material-icons">arrow_back</i></a>

<div class="container login center" style="display: flex; flex-direction: column; place-items: center; min-height: 97.5vh; min-width: 90vw; padding-inline: none; margin-top: 8em;">
	<h2>Log Into Your Account</h2>
	<div class="row">
		<div class="col s12 m9 l8 z-depth-2 valign-wrapper center" style="width: 50vw; height: 40vh; padding:1em">
			<form action="./login.php" method="post" style="width: 100%;">
				<div class="input-field">
					<i class="material-icons prefix">person</i>
					<input type="text" name="username" id="username" required="">
					<label for="username">Username</label>
				</div>
				<div class="input-field">
					<i class="material-icons prefix">password</i>
					<input type="password" name="password" id="password" required="">
					<label for="password">Password</label>
					<span class="right" id="passToggle" onclick="togglePasswordVisibility()" style="position: relative; top: -3em; cursor: pointer;
					"><i class="material-icons grey-text">visibility</i></span>

				</div>
				<div class="input-field">
					<input type="submit" class="btn blue darken-4" value="LOGIN" name="login">
				</div>
				<p>Click
					<a href="./register.php">here</a> if you don't have an account
				</p>
			</form>
		</div>
	</div>
</div>

<?php
include('./togglePassword.php');
include('./footer.php');

if (isset($_POST['login'])) {
	include('../config/dbconnect.php');

	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	$select = mysqli_query($connection, "SELECT * from users WHERE `username` = '$username' AND `password` = '$password'");

	$row = mysqli_fetch_array($select);

	if (is_array($row)) {
		header('Location:../index.php');
		$_SESSION['id'] = $row['id'];
	} else {
		echo '<script type="text/javascript">';
		echo 'alert("Invalid Username or Password")';
		echo 'window.location.href="../index.php"';
		echo '</script>';
	}
}

?>