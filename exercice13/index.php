<?php
    $responseFirstname =  '<p style="color:red;">Le prénom doit avoir entre 2 et 50 caractères !</p>';
    $responseLastname =  '<p style="color:red;">Le nom doit avoir entre 2 et 50 caractères !</p>';
    $responseAge =  '<p style="color:red;">L\'âge doit être compris entre 0 et 150 ans !</p>';
    $goodResponse =  '<p style="color:green;">Bonjour ' . $_POST['firstname'] . ', tu as ' . $_POST['age']. ' ans et tu es le bienvenue !</p>';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 13</title>
</head>
<body>

    <h1>Exercice sur le formulaire</h1>

    <?php

        if (strlen($_POST['firstname']) >=2 && strlen($_POST['firstname']) <=50 ) {
            echo htmlspecialchars($goodResponse);
        }
        else{ echo htmlspecialchars($responseFirstname);}

        if (strlen($_POST['lastname']) >=2 && strlen($_POST['lastname']) <=50 ) {
            echo htmlspecialchars($goodResponse);
        }
        else{ echo htmlspecialchars($responseLastname);}



        if (is_numeric($_POST['age']) && $_POST['age'] >=0 && $_POST['age'] <=150 ) {
            $_POST['age'] = intval($_POST['age']);
            echo htmlspecialchars($goodResponse);
        }
        else{  echo htmlspecialchars($responseAge);}
        echo '<br>';

    ?>

    <form action="index.php" method="POST">
        <input placeholder="Prénom" type="text" name='firstname'>
        <input placeholder="Nom" type="text" name='lastname'>
        <input placeholder="Age" type="text" name='age'>
        <input type="submit">
    </form>

</body>
</html>