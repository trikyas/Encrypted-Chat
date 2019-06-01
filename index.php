<?php

require('classes/cchat.class.php');

date_default_timezone_set('Australia/Sydney');

?>
<!DOCTYPE html>

<html lang="en">

	<head>
		<title>Chad's Crypto Chat</title>
		<meta charset="iso-8859-1">
		<meta name="description" content="CChat ~ Cryptochat">
		<meta name="author" content="Chad Trikyas Mooney">
		<meta name="copyright" content="&copy; 2010-<?php echo date('Y'); ?> Chad Trikyas Mooney">

		<link type="text/css" href="css/cchat.css" rel="stylesheet" media="all">
        <link type="text/css" href="css/custom.css" rel="stylesheet" media="all">

		<script type="text/javaScript" src="js/cchat.js"></script>
		<script type="text/javaScript" src="js/bf.js"></script>
	</head>

	<body>
<div class="content">



		<div id="chatboxcontainer">

			<noscript>
				<p>Browser JavaScript must be enabled for CChat to operate.</p>
			</noscript>

			<div id="title">Chad's–Crypto–Chat</div>
			<div id="chatbox" class="curved">

			<?php
				echo Chatbox::outputMessages();
			?>

			</div>

			<div id="chatboxinput">
				<input type="text" id="name" name="name" maxlength="15" placeholder="name" class="curved">
				<input type="password" id="pw" maxlength="30" placeholder="password" class="curved">
				<textarea id="message" name="message" maxlength="255" cols="26" rows="7" placeholder="message" class="curved"></textarea>
				<div id="remcharcontainer"><span id="remchar">255</span> chars remaining</div>
				<div>
					<input type="button" id="chatsubmit" value="SEND" class="curved">
					<input type="button" id="decrypt" value="DECRYPT" class="curved">
				</div>
				<div id="error"></div>
			</div>

			<div id="debug"></div>

		</div>


</div>

	</body>

</html>
