<?php

	$name = isset($_GET['name']) ? $_GET['name'] : false;
	$age = isset($_GET['age']) ? $_GET['age'] : false;

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Test Form</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="./contact.css" />
</head>
<body>
<div class="container">
<h1>Contact Form</h1>
<?php

	// Name sent in
	if ($name) {
		echo '<p>Thank you. We will read your message as soon as possible!</p>';
	}

	// Age sent in
	else if ($age) {
		echo '<p>Thank you, ' . htmlentities($age). ' year old stranger</p>';
	}

	// Nothing sent in
	else {
		echo '<p>Thank you, curious human</p>';
	}

?>
</div>
</body>
</html>
