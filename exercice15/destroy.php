<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destroy</title>
</head>
<body>
    <h1>Page Destroy</h1>
    <?php include 'menu.php'; ?>
    <p>La session a été détruite</p>


</body>
</html>