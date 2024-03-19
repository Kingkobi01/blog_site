<?php
include("../config/dbconnect.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	echo "<h1>Deleting $id....</h1>";
	$del_query = "DELETE FROM comments WHERE comment_id = '$id'";
	$result = mysqli_query($connection, $del_query);
	if ($result) {
		header('Location:../index.php#comments');
	}
}
