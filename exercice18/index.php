<?php

    try{

        $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch ( Exception $e){
        // si la connexion a échouée, le die() stop la page et affiche un message
        die('Problème avec la base de donnée :' . $e->getMessage());
    }

    if(isset($_GET['color'])){
        //requete pour recuperer tous les fruits dont la couleur est celle présente dans l'url (requete préparee car on a une variable php dans la requete)
        $response = $bdd->prepare("SELECT * FROM fruits WHERE color = ?");
        $response->execute([
            $_GET['color']
            ]);
    } else{
        //requete pour recuperer tous les fruits
        $response = $bdd->query('SELECT * FROM fruits');

    }

    // sous forme d'un tableau associatif
    $fruits = $response->fetchAll(PDO::FETCH_ASSOC);

    // on cloture la varibale
    $response->closeCursor();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice18</title>
</head>

<body>

    <form action="index.php" method="GET">
        <input type="text" name="color" placeholder="Couleur de fruit">
        <input type="submit">
    </form>
<?php

    if (!empty($fruits)){

        echo '<ul>';
        foreach ($fruits as $fruit){
            echo '<li>' . htmlspecialchars($fruit['name']). ' ' . htmlspecialchars($fruit['color']). '</li>';
        }
        echo '</ul>';

    } else{

        echo '<p>Aucun fruit à afficher</p>';

    }
?>

</body>
</html>