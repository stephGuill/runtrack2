<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des arguments GET</title>
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <div class="container">
        <h1>Affichage des arguments GET</h1>
        
        <h2>Tableau des arguments GET reçus</h2>
        
        <?php
        // Algorithme pour afficher les arguments $_GET dans un tableau HTML
        if (!empty($_GET)) {
            echo '<table class="arguments-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Argument</th>';
            echo '<th>Valeur</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            
            // Parcourir tous les arguments GET
            foreach ($_GET as $argument => $valeur) {
                echo '<tr>';
                echo '<td class="argument-name">' . htmlspecialchars($argument) . '</td>';
                echo '<td class="argument-value">' . htmlspecialchars($valeur) . '</td>';
                echo '</tr>';
            }
            
            echo '</tbody>';
            echo '</table>';
            
            // Afficher le nombre total d'arguments
            $nombreArguments = count($_GET);
            echo '<p><strong>Nombre total d\'arguments : ' . $nombreArguments . '</strong></p>';
            
        } else {
            echo '<div class="no-arguments">';
            echo 'Aucun argument GET reçu. Utilisez le formulaire ci-dessous pour tester.';
            echo '</div>';
        }
        ?>
        
        <h2>Formulaire de test</h2>
        <p>Remplissez les champs ci-dessous et cliquez sur "Envoyer" pour tester l'affichage des arguments GET :</p>
        
        <form method="GET" action="">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" placeholder="Ex: Stephane" value="<?php echo isset($_GET['prenom']) ? htmlspecialchars($_GET['prenom']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Dupon" value="<?php echo isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="age">Âge :</label>
                <input type="text" id="age" name="age" placeholder="Ex: 25" value="<?php echo isset($_GET['age']) ? htmlspecialchars($_GET['age']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" placeholder="Ex: Paris" value="<?php echo isset($_GET['ville']) ? htmlspecialchars($_GET['ville']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label for="profession">Profession :</label>
                <input type="text" id="profession" name="profession" placeholder="Ex: Développeur" value="<?php echo isset($_GET['profession']) ? htmlspecialchars($_GET['profession']) : ''; ?>">
            </div>
            
            <input type="submit" value="Envoyer les données">
        </form>
        
        <div class="info-box">
            <h3>Comment ça marche :</h3>
            <ul>
                <li>Le formulaire utilise la méthode <strong>GET</strong></li>
                <li>Chaque champ rempli devient un argument dans l'URL</li>
                <li>L'algorithme parcourt le tableau <strong>$_GET</strong> avec <strong>foreach</strong></li>
                <li>Chaque paire clé/valeur est affichée dans une ligne du tableau</li>
                <li>La fonction <strong>htmlspecialchars()</strong> sécurise l'affichage</li>
            </ul>
            
            <h4>Exemple d'URL générée :</h4>
            <code>index.php?prenom=Stephane&nom=Dupon&age=30&ville=Paris</code>
        </div>
        
        <div style="margin-top: 20px; text-align: center; color: #666;">
            <p><em>Généré avec PHP - <?php echo date('d/m/Y H:i:s'); ?></em></p>
        </div>
    </div>
</body>
</html>