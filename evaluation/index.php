<?php

//appel des variables
if(
    isset($_POST['title']) &&
    isset($_POST['address']) &&
    isset($_POST['city']) &&
    isset($_POST['city_code']) &&
    isset($_POST['surface']) &&
    isset($_POST['price']) &&
    isset($_POST['type'])


){

    //bloc de verifs
    if (!preg_match('/^\d{5}$/', $_POST['city_code'])){
        $errors[] = 'Le code postal n\'est pas valide';
    }
    if (!preg_match('/^\d{1,10}$/', $_POST['price'])){
        $errors[] = 'Le prix n\'est pas valable';
    }
    if (!preg_match('/^\d{1,5}$/', $_POST['surface'])){
        $errors[] = 'La surface n\'est pas valable';
    }


    if (!isset($errors)){

        //second blocs de verifs ( si mail pas déja pris)

        //connexion bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8', 'root', '');

        } catch ( Exception $e){
            die('Problème avec la base de donnée :' . $e -> getMessage());
        }

        $insertLogement= $bdd->prepare('INSERT INTO logements (titre, address, city, city_code, surface, price, photo, type, description) VALUES (?,?,?,?,?,?,?,?,?)');

        $statut=$insertLogement->execute([
            $_POST['title'],
            $_POST['address'],
            $_POST['city'],
            $_POST['city_code'],
            $_POST['surface'],
            $_POST['price'],
            $_FILES['photo']['name'],
            $_POST['type'],
            $_POST['description'],
        ]);
        //recuperation du dernier ID inserer pour changer le nom des images plus tard
        $last = $bdd->lastInsertId();

        if($statut){
            $success='Le logement a bien été créé!';
        }else {
            $errors[]= 'Il y a eu un problème. Veuillez ressayer plus tard.';
        }
    }
    if($_FILES['photo']['error'] == 1 || $_FILES['photo']['error'] == 2 || $_FILES['photo']['size'] > 2048000 ){
        $errors[] = 'Taille trop grande';
    }
    if($_FILES['photo']['error'] == 3 ){
        $errors[] = 'Fichier partiellement téléchargé';
    }
    //pas de message erreur 4 puisque l'image est falcultative
    if($_FILES['photo']['error'] == 6 || $_FILES['photo']['error'] == 7 || $_FILES['photo']['error'] == 8){
        $errors[] = 'Problème avec le serveur, veuillez réessayer !!!!';
    }
    if($_FILES['photo']['error'] == 0){

        $format = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['photo']['tmp_name']);
        if($format != 'image/jpeg' && $format != 'image/png' && $format != 'image/gif'){
            $errors[]= 'Petit malin, ce n\'est pas le bon format de fichier';
        }
        else {
            $name = 'images/logement_'.$last.'.jpg';
            $changename= move_uploaded_file($_FILES['photo']['tmp_name'], $name);
            $success = 'L\'image a bien été transmise ! ! ! ';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <nav>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link " href="affichage.php">Affichage des Logements existants</a></li>
        </ul>
    </nav>

<div class="container-fluid">

    <div class="row">

        <div class="col-12 col-md-8 offset-md-2 py-5">
            <h1 class="pb-4 text-center">Ajouter un Nouveau Logement</h1>
            <form action="index.php" method="POST" enctype="multipart/form-data" class="col-12 col-md-8 offset-md-2">

                <?php
                    if(isset($errors)){
                        foreach($errors as $error){
                            echo '<pre class="alert alert-danger">' . $error . '</pre>';
                        }
                    }

                    if(isset($success)){
                        echo '<p class="alert alert-success">' . $success . '</p>';
                    }
                ?>

                <div class="mb-3">
                    <label for="title">Titre de l'annonce</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <label for="adresse">Adresse du bien</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" name="city">
                </div>
                <div class="mb-3">
                    <label for="city_code">Code Postal</label>
                    <input type="text" class="form-control" name="city_code">
                </div>
                <div class="mb-3">
                    <label for="surface">Surface en m²</label>
                    <input type="text" class="form-control" name="surface">
                </div>
                <div class="mb-3">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" name="price">
                </div>
                <div class="mb-3">
                    <label for="photo">Ajouter une photo (facultatif)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
                    <input type="file" name="photo" accept="image/jpeg, image/png, image/gif">
                </div>
                <div class="mb-3">
                    <input type="radio" name="type" value="location" checked>
                    <label for="location">Location</label>
                    <input type="radio" name="type" value="vente">
                    <label for="location">Vente</label>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10" ></textarea>
                </div>
                <div>
                    <input value="Créer le logement" type="submit" class="btn btn-primary col-12">
                </div>

            </form>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>

</body>
</html>