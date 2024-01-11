a   <?php

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

$email = isset($_POST['email']) ? (string)$_POST['email'] : '';
$message = isset($_POST['message']) ? (string)$_POST['message'] : '';
$msgName = '';
$msgMessage = '';

// form is sent: perform formchecking!
if (isset($_POST['btnSubmit'])) {

    $allOk = true;

    // name not empty
    if (trim($email) === '') {
        $msgName = 'Gelieve een geldig email adres   in te voeren';
        $allOk = false;
    }

    if (trim($message) === '') {
        $msgMessage = 'Gelieve een boodschap in te voeren';
        $allOk = false;
    }

    // end of form check. If $allOk still is true, then the form was sent in correctly
    if ($allOk) {
        // build & execute prepared statement
        $stmt = $db->prepare('INSERT INTO messages (sender, message, added_on) VALUES (?, ?, ?)');
        $stmt->execute(array($email, $message, (new DateTime())->format('Y-m-d H:i:s')));
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
    <title>Testform</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>

<main class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <h1>Contactformulier</h1>

        <div>
            <label for="email">Email *</label>
            <input type="email" id="email" name="email" value="<?php echo htmlentities($email); ?>" class="input-text"/>
            <span class="message error"><?php echo htmlentities($msgName); ?></span>
        </div>

        <div>
            <label for="message">Bericht *</label>
            <textarea name="message" id="message" rows="5" cols="40"><?php echo htmlentities($message); ?></textarea>
            <span class="message error"><?php echo htmlentities($msgMessage); ?></span>
        </div>
        <div>

        </div>
        <input type="submit" id="btnSubmit" name="btnSubmit" value="versturen"/>
    </form>
</main>
</body>
</html>
