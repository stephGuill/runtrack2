<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour les prénoms commençant par "T"
$sql = "SELECT * FROM etudiants WHERE prenom LIKE 'T%'";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 04 - Prénoms commençant par T</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1> Job 04 - Prénoms commençant par "T"</h1>
        
        <div class="info-box">
            <h3> Fonctionnement :</h3>
            <p>• Connexion à la base jour09 avec <code>PHP</code></p>
            <p>• Utilisation de LIKE 'T%' pour pattern matching</p>
            <p>• Récupération de toutes les informations des étudiants concernés</p>
        </div>

        <div class="sql-query">
            <p> Requête SQL :</p><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, " Étudiants dont le prénom commence par 'T'");
        
        // Statistiques et détails
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo " Statistiques :<br>";
            echo "• Nombre d'étudiants trouvés : " . $result->num_rows . "<br>";
            
            // Liste des prénoms trouvés
            $result->data_seek(0);
            $prenoms = [];
            while ($row = $result->fetch_assoc()) {
                $prenoms[] = $row['prenom'];
            }
            
            echo "• Prénoms trouvés : " . implode(', ', $prenoms) . "";
            echo "</div>";
        } else {
            echo "<div class='info-box'>";
            echo " Information :<br>";
            echo "Aucun étudiant trouvé avec un prénom commençant par 'T'";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job03/index.php"> Job 03</a>
            <a href="../job05/index.php"> Job 05</a>
            <a href="../"> Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>