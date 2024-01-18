<?php

$name = isset($_GET['name']) ? $_GET['name'] : false;
$age = isset($_GET['age']) ? $_GET['age'] : false;

?><!DOCTYPE html>
<html lang="nl">
<head>
    <title>Contact</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../../style.css"/>
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
<main>
    <div class="container">
        <section class="intro">
            <h1>Contact</h1>
            <p>Vragen? Vul Dit formulier in. wij zullen uw vraag zo snel mogelijk beantwoorden!</p>
            <p>Bij opmerkingen over onze producten vragen wij het type en uw factuurnummer in uw bericht te
                plaatsen!</p>
        </section>
        <hr>
        <div class="formulier">
            <?php

            // Name sent in
            if ($name) {
                echo '<p>Bedankt. We zullen je bericht zo snel mogelijk lezen!</p>';
            } // Age sent in
            else if ($age) {
                echo '<p>Thank you, ' . htmlentities($age) . ' year old stranger</p>';
            } // Nothing sent in
            else {
                echo '<p>Bedankt, wilde mens</p>';
            }

            ?>

        </div>
</main>
<footer>
    <div class="container">
        <div class="socialmedia">
            <a href="https://www.facebook.com/AudiBelux" target="_blank"><img src="../../img/svg's/facebook-f.svg"
                                                                              alt="facebook logo"></a>
            <a href="https://www.instagram.com/audibelux/" target="_blank"><img src="../../img/svg's/instagram.svg"
                                                                                alt="instagram logo"></a>
            <a href="https://www.youtube.com/@Audi" target="_blank"><img src="../../img/svg's/youtube.svg"
                                                                         alt="youtube logo"></a>
        </div>

        <div class="footerlinks">
            <a href="./modellen">Modellen</a>
            <a href="./diensten">Diensten</a>
            <a href="./contact">Contact</a>
            <a href="./about">Wie zijn Wij?</a>
        </div>
        <div class="iframe-container">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121633.42496413496!2d3.6343182274126384!3d51.03065166457719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c376aa1845ff4b%3A0x87911685441b19b8!2sAudi%20MIG%20Motors%20Gent%20Zuid!5e0!3m2!1snl!2sbe!4v1703152422796!5m2!1snl!2sbe"
                    width="500" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade" aria-label="google maps kaartje"></iframe>
        </div>
    </div>
</footer>
</body>
</html>
