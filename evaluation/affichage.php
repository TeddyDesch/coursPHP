<?php
 try{
    $bdd = new PDO('mysql:host=localhost;dbname=immobilier;charset=utf8', 'root', '');

}catch(Exception $e){
    die ('Problème avec la base de données : ' . $e->getMessage());
}
// Requête avec une jointure pour récupérer les infos des fruits ainsi que le nom de leur créateur.
// L'alias "as" permet de donner un nom différent au champ du nom du créateur qui sera "user_pseudonym" au lieu de "pseudonym" dans l'array PHP
$getLogements = $bdd->query('SELECT * FROM logements');

// Récupération de tous les fruits sous forme d'arrays PHP associatifs
$houses = $getLogements->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des logements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link " href="index.php">Créer un nouveau logement</a></li>
        </ul>
    </nav>
<div class="container-fluid">

<div class="row">

    <div class="col-12 col-md-8 offset-md-2 py-5">
        <h1 class="pb-4 text-center">Liste des Logements disponible</h1>

        <?php

            
            if(empty($houses)){
                echo '<p class="alert alert-info text-center">Aucun logement à afficher actuellement !</p>';
            } else {
                ?>
                <table class="table table-hover col-10 mt-4">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Code Postale</th>
                            <th>Surface</th>
                            <th>Prix</th>
                            <th>Photo</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        foreach($houses as $house){
                            ?>

                            <tr>
                                <td><?php echo ucfirst(htmlspecialchars($house['titre'])); ?></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['address'])); ?></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['city'])); ?></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['city_code'])); ?></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['surface'])); ?> m²</td>
                                <td><?php echo ucfirst(htmlspecialchars($house['price'])); ?> €</td>
                                <td> <img src="images/logement_13.jpg" style="height:150px; width:150px"></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['type'])); ?></td>
                                <td><?php echo ucfirst(htmlspecialchars($house['description'])); ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
            }
        ?>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>