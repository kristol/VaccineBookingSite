<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>NemKoViD</title>
</head>
<body>
    <nav>
        <div>
            <ul>
                <li class="f"><a href="index.php">Főoldal</a></li>
                <?php if(!isset($_SESSION["user"])): ?>
                <li><a href="signup.php">Regisztráció</a></li>
                <li><a href="login.php">Bejelentkezés</a></li>
                <?php else: ?>
                <li><a><?= $_SESSION["user"]["name"] ?></a></li>
                <li><a href="logout.php">Kijelentkezés</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

<div class="w">