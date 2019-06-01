<?php

require('classes/cchat.class.php');
date_default_timezone_set('Australia/Sydney');

?>
<!DOCTYPE html>

<html lang="en">

	<head>
		<title>Chad's Crypto Chat</title>
		<meta charset="iso-8859-1">
		<meta name="description" content="Chad's ~ Cryptochat">
		<meta name="author" content="Chad Trikyas Mooney">
		<meta name="copyright" content="&copy; 2010-<?php echo date('Y'); ?> Chad Trikyas Mooney">

		<link type="text/css" href="css/cchat.css" rel="stylesheet" media="all">
    <link type="text/css" href="css/custom.css" rel="stylesheet" media="all">

		<script type="text/javaScript" src="js/cchat.js"></script>
		<script type="text/javaScript" src="js/bf.js"></script>

	</head>

	<body>
		<button id="toggle">ON & OFF</button>
	  <a id="togglenote" href="mynotepad.php" target="_blank">NOTES</a>
<div class="content" id="content">




		<div id="chatboxcontainer">

			<noscript>
				<p>Browser JavaScript must be enabled for Chad's Crypto Chat to operate.</p>
			</noscript>

			<div id="title">Chad's–Crypto–Chat</div>
			<div id="chatbox" class="curved">

			<?php
				echo Chatbox::outputMessages();
			?>

			</div>

			<div id="chatboxinput">
				<input type="text" id="name" name="name" maxlength="15" placeholder="Calico Jack" class="curved">
				<input type="password" id="pw" maxlength="30" placeholder="•••••••••" alt="Password" class="curved">
				<textarea id="message" name="message" maxlength="255" cols="26" rows="7" placeholder="Private Message" class="curved"></textarea>
				<div id="remcharcontainer"><span id="remchar">255</span> Chars remaining</div>
				<div>
					<input type="button" id="chatsubmit" value="SEND" class="curved">
					<input type="button" id="decrypt" value="DECRYPT" class="curved">
				</div>
				<div id="error"></div>
			</div>

			<div id="debug"></div>

		</div>


</div>
<script>
var toggle  = document.getElementById("toggle");
var content = document.getElementById("content");

toggle.addEventListener("click", function() {
content.style.display = (content.dataset.toggled ^= 1) ? "block" : "none";
});
</script>
	</body>

</html>
