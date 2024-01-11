<?php

// Show all errors (for educational purposes)
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

// Constanten (connectie-instellingen databank)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'Azerty123');
define('DB_NAME', 'audi_db');

date_default_timezone_set('Europe/Brussels');

// Verbinding maken met de databank
try {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindingsfout: ' . $e->getMessage();
    exit;
}

$name = isset($_POST['name']) ? (string)$_POST['name'] : '';
$email = isset($_POST['email']) ? (string)$_POST['email'] : '';
$message = isset($_POST['message']) ? (string)$_POST['message'] : '';
$msgName = '';
$msgEmail = '';
$msgMessage = '';

// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

    $allOk = true;

    // name not empty
    if (trim($email) === '') {
        $msgEmail = 'Gelieve een geldig email adres   in te voeren';
        $allOk = false;
    }

    if (trim($message) === '') {
        $msgMessage = 'Gelieve een boodschap in te voeren';
        $allOk = false;
    }

    if (trim($name) === '') {
        $msgMessage = 'Gelieve een naam in te voeren';
        $allOk = false;
    }


    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        // build & execute prepared statement
        $stmt = $db->prepare('INSERT INTO messages (sender, message, name, added_on) VALUES (?, ?, ?, ?)');
        $stmt->execute(array($email, $message, $name, (new DateTime())->format('Y-m-d H:i:s')));
        // the query succeeded, redirect to this very same page
        if ($db->lastInsertId() !== 0) {
            header('Location: formchecking_thanks.php?name=' . urlencode($email));
            exit();
        } // the query failed
        else {
            echo 'Databankfout.';
            exit;
        }

    }

}

?><!DOCTYPE html>
<html lang="nl">
<head>
    <title>Contact</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<header>
    <div class="container">
        <section class="navigation">
            <div class="navbar">
                <div class="dropdown">
                    <button class="dropbtn">Menu
                    </button>
                    <div class="dropdown-content">
                        <a href="../modellen">Modellen</a>
                        <a href="../diensten">Diensten</a>
                        <a href="./">Contact</a>
                        <a href="../about">Wie zijn Wij?</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</header>
<main class="container">
    <section class="intro">
        <h1>Contact</h1>
        <p>Vragen? vul Dit formulier in. wij zullen uw vraag zo snel mogelijk beantwoorden!</p>
        <p>Bij opmerkingen over onze producten vragen wij het type en uw factuurnummer in uw bericht te plaatsen!</p>
    </section>
    <hr>
    <div class="formulier">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <label for="name">Naam</label>
                <input type="text" id="name" name="name" value="<?php echo htmlentities($name); ?>" class="input-text"/>
                <span class="message error"><?php echo htmlentities($msgName); ?></span>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlentities($email); ?>"
                       class="input-text"/>
                <span class="message error"><?php echo htmlentities($msgEmail); ?></span>
            </div>

            <div>
                <label for="message">Bericht</label>
                <textarea name="message" id="message" rows="5"
                          cols="40"><?php echo htmlentities($message); ?></textarea>
                <span class="message error"><?php echo htmlentities($msgMessage); ?></span>
            </div>
            <div>

            </div>
            <input type="submit" id="btnSubmit" name="btnSubmit" value="versturen"/>
            <hr>
        </form>
        <img src="../../img/contact/contact.jpg" alt="Consultant">
    </div>
</main>
<footer></footer>
</body>
</html>
