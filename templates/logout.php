<?php

session_start();

include("./header.php");
?>

<a href="../index.php" class="btn blue darken-4"><i class="material-icons">arrow_back</i></a>
<div class="container login center" style="display: flex; flex-direction: column; place-items: center; min-height: 97.5vh; min-width: 90vw; padding-inline: none;margin-top: 8em;">
	<h2><?php print(session_destroy() ? "You've Logged out Successfully!" : "Logout Unsuccessful") ?></h2>
	<a href="../index.php" class="btn blue pulse darken-4">Continue Reading...</a>
</div>
<?php
include("./footer.php");
?>