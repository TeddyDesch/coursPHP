<?php

if(
    isset($_GET['search'])
){

    if (!preg_match('/^[a-zA-Z]{1,50}$/', $_GET['search'])){
       $errors [] = 'La recherche n\'est pas valide';
    }


    //si pas d'erreur
    if (!isset($error)){

        //second blocs de verifs ( si mail pas déja pris)

        //connexion bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch ( Exception $e){
            die('Problème avec la base de donnée :' . $e -> getMessage());
        }

        //requete SQL pour faire une recherche partielle d'un nom
        $response = $bdd->prepare("SELECT * FROM fruits WHERE name LIKE ? ");

        // on concatèene le champ "search" avec les % pour faire une recherche partielle sur sql
        $response->execute([
            '%'.$_GET['search'].'%'
        ]);

        //resultats de la requete sous forme d'un tableau associatif
        $fruits = $response -> fetchAll(PDO::FETCH_ASSOC);
        //var_dump($fruit);

        // si pas de reponse à requete petit message
        if(empty($fruits)){
            echo '<p style="color:red;">Aucun resultat à afficher ! </p>';
        }


    //Fermeture de la requete
    $response -> closeCursor();
    }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice21</title>
</head>
<style>
    td,th{
        border: 1px black solid;
        padding : 3px;
    }
    table{
        border-collapse: collapse; /* pour fussionner les bordures de cellules*/
    }
</style>
<body>

    <form action="index.php" method="GET">

    <input type="text" placeholder="Recherche..." name="search">
    <input type="submit">

    </form>

    <?php


    if (isset($success)){
        echo $success;
    }


    if (!empty($fruits)){

        echo '<p> Il y a '. count($fruits).' résultat(s) de recherche pour "' . htmlspecialchars($_GET['search']). '":</p>';

        ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Couleur</th>
                    <th>Origine</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    foreach($fruits as $fruit){
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars(ucfirst($fruit['name'])). '</td>';
                    echo '<td>' . htmlspecialchars($fruit['color']). '</td>';
                    echo '<td>' . htmlspecialchars(ucfirst($fruit['origin'])). '</td>';
                    echo '<td>' . htmlspecialchars($fruit['price']). '€'.'</td>';
                    echo'</tr>';
                    }
                    ?>
            </tbody>
        </table>

        <?php
    }
    ?>
    <?php

    if(isset($errors)){
        foreach($errors as $error)
        echo '<p style="color:red;">'.$error .'</p>';
    }

    ?>
</body>
</html>