<?php

// if ( !empty($_POST) ) {
// 	print_r($_POST);
// }

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	// Make sure your local server is setup properly for this.

	/*
	 * Home Work
	 *
	 * Use heredocs to prepare an HTML email message, and set the necessary headers.
	 * Refer here for more info: php.net/mail
	 */
	if ( mail(
		'jeffrey@envato.com',
		'New Website Message',
		htmlspecialchars($_POST['message']))
		//, headers
	) {
		$status = "Thank you for your message.";
	}
}

?>
<!doctype html>
<html>
<head>
	<title></title>
	<style>
	form ul { margin: 0; padding: 0; }
	form li { list-style: none; margin-bottom: 1em; }
	</style>
</head>
<body>

	<h1>Contact Form</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="name">Name: </label>
				<input type="text" name="name" id="name">
			</li>

			<li>
				<label for="email">Email: </label>
				<input type="text" name="email" id="email">
			</li>

			<li>
				<label for="message">Your Message: </label><br>
				<textarea name="message" id="message"></textarea>
			</li>

			<li>
				<input type="submit" value="Go!">
			</li>
		</ul>
	</form>

	<?php if(isset($status)) echo $status; ?>

</body>
</html>