<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comptage des arguments POST</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Comptage des arguments POST</h1>
        
        <?php
        // Algorithme pour compter les arguments $_POST
        $nombreArguments = count($_POST);
        
        // Afficher le résultat
        if ($nombreArguments > 0) {
            echo '<div class="resultat">';
            echo "Le nombre d'arguments POST envoyé est : " . $nombreArguments;
            echo '</div>';
            
            // Afficher les détails si des arguments sont présents
            echo '<div class="details">';
            echo '<h3>Détails des arguments reçus :</h3>';
            echo '<div class="argument-list">';
            
            foreach ($_POST as $key => $value) {
                echo '<div class="argument-item">';
                echo '<span class="key">' . htmlspecialchars($key) . '</span> = ';
                echo '<span class="value">"' . htmlspecialchars($value) . '"</span>';
                echo '</div>';
            }
            
            echo '</div>';
            echo '</div>';
        } else {
            echo '<div class="resultat-vide">';
            echo "Le nombre d'arguments POST envoyé est : 0";
            echo '<br><small>Utilisez le formulaire ci-dessous pour tester</small>';
            echo '</div>';
        }
        ?>
        
        <h2>Formulaire de test</h2>
        <p>Utilisez ce formulaire pour tester l'algorithme avec différents champs :</p>
        
        <form method="POST" action="">
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
            
            <div class="form-group">
                <label for="profession">Profession :</label>
                <input type="text" id="profession" name="profession" placeholder="Entrez votre profession">
            </div>
            
            <input type="submit" value="Envoyer les données">
        </form>
        
        <div class="info-box">
            <h3>Différences entre GET et POST :</h3>
            <ul>
                <li><p>GET</p> : Les données apparaissent dans l'URL (visible)</li>
                <li><p>POST</p> : Les données sont envoyées dans le corps de la requête (non visible dans l'URL)</li>
                <li><p>GET</p> : Limité en taille (généralement ~2000 caractères)</li>
                <li><p>POST</p> : Pas de limite de taille pratique</li>
                <li><p>GET</p> : Peut être mis en favoris, partagé</li>
                <li><p>POST</p> : Plus sécurisé pour les données sensibles</li>
            </ul>
            
            <h4>Algorithme utilisé :</h4>
            <code>$nombreArguments = count($_POST);</code>
            <p>La fonction count() compte le nombre d'éléments dans le tableau $_POST.</p>
        </div>
        
       
    </div>
</body>
</html>