<?php
    //on lance le cookie de session
    session_start();

    //on verifie si les session existent deja
    if(isset($_SESSION['user'])) {
        $error = 'Les variables existe déja';
    }else {//sinon on les créés avec petit message qui va bien
        $_SESSION['user'] = [
            'firstname' => 'alice',
            'lastname' => 'BOB',
        ];
        $success = 'Les variables sont bien créées !';
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Page Create</h1>
    <?php include 'menu.php'; ?>
    <?php

    //on affiche les message créés auparavant
    if(isset($error)){
        echo '<p style="color:red;">'.$error.'</p>';
    }
    if(isset($success)){
        echo '<p style="color:green;">'.$success.'</p>';
    }
    ?>

</body>
</html>