<?php

//appel des variables
if(
    isset($_POST['email']) &&
    isset($_FILES['photo'])

){
    // on fait les verifs
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email pas valide';
    }

    if($_FILES['photo']['error'] == 1 || $_FILES['photo']['error'] == 2 || $_FILES['photo']['size'] > 2048000 ){
       $errors[] = 'Taille trop grande';
    }

    // if($_FILES['photo']['error'] == 2 ){
    //     $errors[] = 'Taille trop grande (form)';
    // }

    if($_FILES['photo']['error'] == 3 ){
        $errors[] = 'Fichier partiellement téléchargé';
    }

    if($_FILES['photo']['error'] == 4 ){
        $errors[] = 'Pas de fichier à télécharger';
    }

    if($_FILES['photo']['error'] == 6 || $_FILES['photo']['error'] == 7 || $_FILES['photo']['error'] == 8){
        $errors[] = 'Problème avec le serveur, veuillez réessayer !!!!';
    }


    if($_FILES['photo']['error'] == 0){

        $format = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);
        //$extension = FILEINFO_EXTENSION);
        if($format != 'image/jpeg' && $format != 'image/png' && $format != 'image/gif'){
            $errors[]= 'Petit malin, ce n\'est pas le bon format de fichier';
        }
        else {
            $name = md5(time().rand());
            $changeName = move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$name.'.jpg');
            $success = 'L\'image a bien été transmise ! ! ! ';
        }
    }

    // echo '<pre>';
    // print_r($extension);
    // echo '</pre>';

};

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 23</title>
</head>
<body>
    <?php
    if(isset($errors)){
        foreach($errors as $error){
        echo '<p style="color:red;">'.$error .'</p>';
        }
    }
    if (isset($success)){
        echo '<p style="color:green;">'.$success .'</p>';
    }

    ?>



    <form action="index.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <input type="text" name="email">
        <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
        <input type="submit">

    </form>


</body>
</html>