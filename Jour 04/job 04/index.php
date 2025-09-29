<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des arguments POST</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Affichage des arguments POST</h1>
        
        <h2>Tableau des arguments POST reçus</h2>
        
        <?php
        // Algorithme pour afficher les arguments $_POST dans un tableau HTML
        if (!empty($_POST)) {
            echo '<table class="arguments-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Argument</th>';
            echo '<th>Valeur</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Parcourir tous les arguments POST
            foreach ($_POST as $argument => $valeur) {
                echo '<tr>';
                echo '<td class="argument-name">' . htmlspecialchars($argument) . '</td>';
                echo '<td class="argument-value">' . htmlspecialchars($valeur) . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            
            // Afficher le nombre total d'arguments
            $nombreArguments = count($_POST);
            echo '<div class="post-info">';
            echo '<p>Nombre total d\'arguments POST : ' . $nombreArguments . '</p>';
            echo '</div>';
            
        } else {
            echo '<div class="no-arguments">';
            echo '<h3>Aucun argument POST reçu</h3>';
            echo '<p>Utilisez le formulaire ci-dessous pour envoyer des données POST et voir le tableau s\'afficher.</p>';
            echo '</div>';
        }
        ?>
        
        <h2>Formulaire de test POST</h2>
        <p>Remplissez les champs ci-dessous et cliquez sur "Envoyer" pour tester l'affichage des arguments POST :</p>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Ex: Stephane">
            </div>
            
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Dupon">
            </div>
            
            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="text" id="age" name="age" placeholder="Ex: 25">
            </div>
            
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" placeholder="Ex: Paris">
            </div>
            
            <div class="form-group">
                <label for="profession">Profession :</label>
                <input type="text" id="profession" name="profession" placeholder="Ex: Développeur">
            </div>
            
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="text" id="email" name="email" placeholder="Ex: exemple@email.com">
            </div>
            
            <input type="submit" value="Envoyer les données POST">
        </form>
        
        <div class="post-info">
            <h3>Caractéristiques de la méthode POST :</h3>
            <ul>
                <li><p>Sécurité</p> : Les données ne sont pas visibles dans l'URL</li>
                <li><p>Taille</p> : Pas de limitation pratique de taille des données</li>
                <li><p>Confidentialité</p> : Les données ne restent pas dans l'historique du navigateur</li>
                <li><p>Idéal pour</p> : Formulaires de contact, inscription, envoi de fichiers</li>
            </ul>
            
            <h4>Algorithme utilisé :</h4>
            <code>
            foreach ($_POST as $argument => $valeur) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;// Afficher chaque paire argument/valeur dans le tableau<br>
            }
            </code>
        </div>
        
        <div class="info-box">
            <h3>Exemple de résultat attendu :</h3>
            <p>Si vous remplissez les champs "prenom" avec "Stephane" et "nom" avec "Dupon", le tableau affichera :</p>
           
        </div>
        
       
    </div>
</body>
</html>