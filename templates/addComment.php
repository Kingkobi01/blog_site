<?php
session_start();
include('../config/dbconnect.php');

if (isset($_POST['submit'])) {
	$owner_id = $_SESSION['id'];

	$message = mysqli_real_escape_string($connection, $_POST['message']);

	$add_comment_query = "INSERT INTO comments (`owner_id`, `message`)  VALUES ('$owner_id', '$message')";

	if (mysqli_query($connection, $add_comment_query)) {
		header('Location:../index.php#comment');
	}
}
