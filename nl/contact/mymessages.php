<?php

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

// Opvragen van alle taken uit de tabel tasks
$stmt = $db->prepare('SELECT * FROM messages ORDER BY added_on DESC');
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);


?><!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Mijn berichten</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="contact.css">
</head>
<body>
<div class=container>
    <h1>Inkomende berichten</h1>
    <?php if (sizeof($items) > 0) { ?>
    <div class=listing>
        <div>
            <ul>
                <?php foreach ($items as $item) { ?>
                    <li>
                        <p>Verender: <?php echo htmlentities($item['name']); ?></p>
                        <p>Email: <?php echo htmlentities($item['sender']); ?></p>
                        <p>Datum: <?php echo (new Datetime(htmlentities($item['added_on'])))->format('d-m-Y H:i:s'); ?></p>
                        <p>Bericht:<br><?php echo htmlentities($item['message']); ?></p>
                    </li>
                <?php } ?>
            </ul>
            <?php
            } else {
            echo '<p>Nog geen berichten ontvangen.</p>' . PHP_EOL;
            }
            ?>
        </div>
</body>