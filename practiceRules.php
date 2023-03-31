<?php
        session_start();
        include ("php/connection.php");
        if (!isset($_SESSION['username'])){
            header("Location: signin.php");
        }
        else{
        ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rules</title>
        <meta charset="utf-8">
        <meta name="Nicely programmed site" aria-keyshortcuts="" keywords="javascript, functions">
        <link href="/dashboard/images/favicon.png" rel="icon" type="image/png">
        <link rel="stylesheet" href="css/rules.css">
    </head>
    <body>
    <h1>Sam whiz quizz</h1>
        <main>
        <h2>RULES</h2>
        <code>Dont exit the quiz or change tabs, because if you do that, the quiz will be ended for you</code></br>
        <code>Do not refresh the page, as this also ends the quiz for you</code></br>
        <code>Do not close this page or go back, as you have started the test already</code></br>
        <code>You have fourty (40) questions to attempt</code></br>
        <code>You'll be given a time frame of an hour</code></br>
        <code>Your time starts immediately you click start</code></br>
           <p><a href="quizPractice.php">Start now</a></p>
        </main>

    </body>
    </html>
    <?php
    }
    ?>