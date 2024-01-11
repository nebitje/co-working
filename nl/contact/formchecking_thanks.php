<?php

	$name = isset($_GET['name']) ? $_GET['name'] : false;
	$age = isset($_GET['age']) ? $_GET['age'] : false;

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Testform</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="../../audicontact/styles.css" />
</head>
<body>
<div class="container">
<h1>Contactformulier</h1>
<?php

	// Name sent in
	if ($name) {
		echo '<p>Bedankt. We zullen je bericht zo snel mogelijk lezen!</p>';
	}

	// Age sent in
	else if ($age) {
		echo '<p>Thank you, ' . htmlentities($age). ' year old stranger</p>';
	}

	// Nothing sent in
	else {
		echo '<p>Bedankt, wilde mens</p>';
	}

?>
</div>
</body>
</html>
