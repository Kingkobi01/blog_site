<?php
session_start();
include('./templates/header.php');

?>

<header>
	<nav class="nav-wrapper transparent z-depth-0 align-center">
		<div class="container ">
			<a href="#" class="brand-logo logo grey-text text-lighten-2">Web3 Technology</a>
			<a href="#" class="sidenav-trigger" data-target="mobile-menu">
				<i class=" material-icons">menu</i>
			</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#blog">BLOG</a></li>
				<li><a href="#comment">COMMENTS</a></li>
				<li><a href="#contact">CONTACT</a></li>
				<li><a href="./templates/logout.php">Logout</a></li>
			</ul>

			<ul class="sidenav grey lighten-2" id="mobile-menu">
				<li><a href="#blog">Blog</a></li>
				<li><a href="#comment">Comment</a></li>
				<li><a href="#contact">Contact</a></li>
				<?php if (isset($_SESSION['id'])) { ?>

					<li><a href="./templates/logout.php">Logout</a></li>
				<?php } else { ?>
					<li><a href="./templates/login.php">Login</a></li>

				<?php }
				?>
			</ul>
		</div>
	</nav>
	<div class="container">
		<h1 class="title align-right indigo-text text-lighten-5">How to Become a Web3 Developer and "Sacrifice Your Social Life"</h1>
	</div>
</header>

<body class="indigo lighten-5">
	<? print_r($_SESSION) ?>
	<div class="container section scrollspy" id="blog">
		<p><span class="blue-text text-darken-2">S</span>o, you're ready to become a Web3 developer and say goodbye to your social life? Great! Here's a helpful guide that will make sure you're on the fast track to becoming the ultimate programming machine.</p>
		<p>First things first, let's dive into the basics of blockchain technology <i>(because who doesn't want to spend hours reading about complex concepts?)</i>. Once you've got that down, it's time to choose a blockchain platform to work with. Don't waste too much time on this step, because they're all basically the same. <i>Yawn</i>.</p>

		<p>Now, it's time to learn a programming language <i>(because clearly, you weren't already juggling enough). </i>But don't worry, you'll get the hang of it eventually <i>(or not).</i> And of course, your first dApp should be your most complex idea, because why start small? Who needs baby steps?</p>
		<p>Once you've got the basics down, join <a href="https://ethereum.org/developers/" target="_blank"> a Web3 development community</a> and spend even more time with other developers <i>(because who doesn't love that?)</i>. Get ready to ask questions and receive feedback <i>(or just get ignored and feel inadequate)</i>.</p>
		<p>And finally, keep learning and experimenting with new ideas <i>(because let's be real, you didn't really want a life outside of work anyway)</i>. Spend your weekends reading whitepapers and attending conferences <i>(because why spend time with friends and family when you can network with strangers?)</i>.</p>
		<p>In all seriousness, becoming a Web3 developer can be a challenging and rewarding journey. But don't forget to take breaks and enjoy the journey along the way. And if sarcasm is your thing, don't be afraid to inject some humor into your learning experience.</p>

		<blockquote class="indigo lighten-4">"Web3 technology is the perfect blend of complex coding and relentless optimism. Who needs a social life when you have the blockchain?" <cite>No one Ever</cite> </blockquote>

	</div>
	<div class="parallax-container">
		<div class="parallax">
			<img src="img/stars.jpg" alt="">
		</div>
	</div>

	<?php
	include('./templates/comments.php');
	include('./templates/footer.php');
	?>