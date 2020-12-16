<?php
session_start();

if(isset($_SESSION['user'])) {
    $hello = 'Bonjour ' . $_SESSION['user']['firstname'].' '. $_SESSION['user']['lastname'].'!';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <h1>Page Display</h1>
    <?php include 'menu.php'; ?>

    <?php

    if(isset($hello)){
        echo $hello;
    }else {
        echo ' Veuillez vous rendre sur la page <a href="create.php">Create.php</a> !';
    }


    ?>


</body>
</html>