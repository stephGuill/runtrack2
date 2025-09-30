<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptage des arguments GET</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Comptage des arguments GET</h1>
        
        <?php
        // Algorithme pour compter les arguments $_GET
        $nombreArguments = count($_GET);
        
        // Afficher le résultat
        echo '<div class="resultat">';
        echo "Le nombre d'arguments GET envoyé est : " . $nombreArguments;
        echo '</div>';
        
        // Afficher les détails si des arguments sont présents
        if ($nombreArguments > 0) {
            echo '<div class="details">';
            echo '<h3>Détails des arguments reçus :</h3>';
            echo '<div class="argument-list">';
            
            foreach ($_GET as $key => $value) {
                echo '<div class="argument-item">';
                echo '<span class="key">' . htmlspecialchars($key) . '</span> = ';
                echo '<span class="value">"' . htmlspecialchars($value) . '"</span>';
                echo '</div>';
            }
            
            echo '</div>';
            echo '</div>';
        }
        ?>
        
        <h2>Formulaire de test</h2>
        <p>Utilisez ce formulaire pour tester l'algorithme avec différents champs :</p>
        
        <form method="GET" action="">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom">
            </div>
            
            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="text" id="age" name="age" placeholder="Entrez votre âge">
            </div>
            
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" placeholder="Entrez votre ville">
            </div>
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" placeholder="Entrez votre email">
            </div>
            
            <input type="submit" value="Envoyer les données">
        </form>
        
        
            <h3>Comment ça marche :</h3>
            <ul>
                <li><p>count($_GET)</p> : Compte le nombre d'éléments dans le tableau $_GET</li>
                <li>Chaque champ du formulaire avec une valeur devient un argument GET</li>
                <li>Les champs vides ne sont pas envoyés (donc pas comptés)</li>
                <li>L'URL sera de la forme : <code>index.php?nom=valeur&prenom=valeur...</code></li>
            </ul>
        </div>
        
       
    </div>
</body>
</html>