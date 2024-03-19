<?php
session_start();
$user_id = $_SESSION['id'];
include('./config/dbconnect.php');
$query = "SELECT * from `comments`";
$result = mysqli_query($connection, $query);
if ($result) {
	$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// print_r($comments);

	function getUsernameAndComment($comment, $connection)
	{
		$id = $comment['owner_id'];
		$message = $comment['message'];

		$query_for_user = "SELECT `username` from `users` WHERE  `id` = '$id'";

		$user_result = mysqli_query($connection, $query_for_user);

		if ($user_result) {
			$username = mysqli_fetch_all($user_result, MYSQLI_ASSOC);
			$username = $username[0]['username'];
			return ['username' => $username, 'message' => $message, 'id' => $id];
		}
	}
}
?>

<div class="container section center">
	<h3 class="scrollspy" id="comments">Comments</h3>
	<div class="row">
		<?php foreach ($comments as $comm) {

			$usernameAndComment = getUsernameAndComment($comm, $connection);
		?>
			<div class="col s12 m5 offset-m1">
				<div class="card comment hoverable">
					<p class="card-title"><?= $usernameAndComment['username']; ?></p>
					<div class="card-description">
						<p><?= $usernameAndComment['message']; ?></p>
					</div>
					<div class="card-action">
						<a href="#edit?id=<?= $comm['comment_id'] ?>" class="waves-effect waves-light modal-trigger btn btn-floating <?= $user_id == $usernameAndComment['id'] ? "" : "disabled"; ?> cyan">
							<i class="material-icons">edit</i>
						</a>
						<div id="edit?id=<?= $comm['comment_id'] ?>" class="modal">
							<div class="modal-content">
								<h5>Edit Comment</h5>
								<div class="container">
									<form action="./templates/editComment.php" method="post">
										<div class="input-field">
											<textarea name="message" id="message" class="materialize-textarea"><?= $comm['message']; ?></textarea>
											<label for="message">Message</label>
										</div>
										<input type="hidden" name="id" value="<?= $comm['comment_id'] ?>">
										<div class="input-field">
											<input type="submit" class="btn blue darken-4" value="UPDATE" name="update">
										</div>
									</form>
								</div>
							</div>
						</div>
						<a href="#delete?id=<?= $comm['comment_id'] ?>" class="waves-effect waves-light modal-trigger btn btn-floating <?= $user_id == $usernameAndComment['id'] ? "" : "disabled"; ?> cyan">
							<i class="material-icons red-text">delete</i>
						</a>
						<div id="delete?id=<?= $comm['comment_id'] ?>" class="modal">
							<div class="modal-content">
								<h5>Delete Comment</h5>
								<p>Are you sure you want to delete <?= substr($usernameAndComment['message'], 0, 17); ?>...</p>
							</div>
							<div class="modal-footer">
								<a href="./templates/deleteComment.php?id=<?= $comm['comment_id'] ?>" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons green-text" style="font-size: 2.5em;">check</i></a>
								<a href="#!" class="modal-close waves-effect waves-green btn-flat"><i class="material-icons red-text" style="font-size: 2.5em;">close</i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="row">
		<div class="col s12 m10 l8 center scrollspy" id="comment">
			<h4>Add a Comment</h4>
			<form action="templates/addComment.php" method="post">
				<div class="input-field">
					<i class="material-icons prefix blue-text">message</i>
					<textarea class="materialize-textarea" name="message" id="message" required></textarea>
					<label for="message">Message</label>
				</div>
				<?php
				if (!(isset($_SESSION['id']))) { ?>

					<a class="waves-effect waves-light blue darken-4 btn" href="./templates/login.php">Login</a>
				<?php
				} else {
				?><div class="input-field">
						<input type="submit" name='submit' value="POST" class="btn-large blue darken-2 wave-effect wave-circle">
					</div>


				<?php } ?>
			</form>
		</div>
	</div>
</div>
<div class="parallax-container">
	<div class="parallax">
		<img src="img/stars.jpg" alt="">
	</div>
</div>
<footer class="page-footer blue darken-3">
	<div class="container scrollspy" id="contact">
		<div class="row">
			<div class="col s12 l6">

				<h2>Meet the Web3 Developer Extraordinaire
				</h2>

				<p>With a passion for complex coding and relentless optimism, Kwabena Boakye is a force to be reckoned with in the world of Web3 development. When he's not busy reading whitepapers or attending conferences, you can find him sacrificing his social life for the blockchain, because who needs friends when you have smart contracts?
				</p>

				<p>With 5 months of experience in programming languages like Solidity, JavaScript, and Rust, Kwabena has built dApps that have left even the most seasoned developers scratching their heads. But don't be fooled by his impressive skills and knowledge – he also has a great sense of humor and loves injecting sarcasm into his work (because why take yourself too seriously?).
				</p>

				<p>If you're looking for a Web3 developer who will work tirelessly to bring your blockchain dreams to life (while also making you laugh), look no further than Kwabena.
				</p>

			</div>
			<div class="col s12 l4 offset-l2">
				<h2>Connect</h2>
				<ul>
					<li style="padding-block: .275em;"><a class="btn-floating hoverable" href=""><i class="fab fa-twitter"></i></a></li>
					<li style="padding-block: .275em;"><a class="btn-floating hoverable" href=""><i class="fab fa-facebook"></i></a></li>
					<li style="padding-block: .275em;"><a class="btn-floating hoverable" href=""><i class="fab fa-linkedin"></i></a></li>
					<li style="padding-block: .275em;"><a class="btn-floating hoverable" href=""><i class="fab fa-github"></i></a></li>
				</ul>
			</div>
		</div>
	</div>