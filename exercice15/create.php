<?php
    session_start();

    if(isset($_SESSION['firstname']) && isset($_SESSION['lastname'])){
        $error = 'Les variables existe déja';
    }else {
        $_SESSION['firstname'] = 'alice';
        $_SESSION['lastname'] = 'BOB';
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
    if(isset($error)){
        echo '<p style="color:red;">'.$error.'</p>';
    }
    if(isset($success)){
        echo '<p style="color:green;">'.$success.'</p>';
    }
    ?>

</body>
</html>