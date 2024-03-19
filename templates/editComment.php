<?php
session_start();
include('../config/dbconnect.php');
if (isset($_POST)) {
	$id = $_POST['id'];
	$message = mysqli_real_escape_string($connection, $_POST['message']);
	$update_query = "UPDATE `comments` SET `message`='$message' WHERE `comment_id` = '$id'";
	$result = mysqli_query($connection, $update_query);
	if ($result) {
		header('Location:../index.php#comments');
	}
}
