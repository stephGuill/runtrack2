<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour compter les étudiants
$sql = "SELECT COUNT(*) as nb_etudiants FROM etudiants";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 07 - Nombre total d'étudiants</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>🔢 Job 07 - Nombre total d'étudiants</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Utilisation de la fonction d'agrégation <strong>COUNT(*)</strong></p>
            <p>• Résultat dans une colonne nommée <code>nb_etudiants</code></p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='stats-box'>";
            echo "<strong>📊 Résultats :</strong> Comptage des étudiants effectué<br>";
            echo "<strong>🔍 Fonction utilisée :</strong> COUNT(*)<br>";
            echo "</div>";
            
            // Récupérer le résultat
            $row = $result->fetch_assoc();
            $nbEtudiants = $row['nb_etudiants'];
            
            // Affichage du tableau
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<caption>🔢 Comptage des étudiants</caption>";
            echo "<thead><tr>";
            echo "<th>Nombre total d'étudiants</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td style='text-align: center; font-size: 2em; font-weight: bold; color: #4CAF50;'>$nbEtudiants</td>";
            echo "</tr>";
            echo "</tbody></table>";
            echo "</div>";
            
            // Affichage du résultat en grand
            echo "<div class='info-box' style='text-align: center; font-size: 1.2em;'>";
            echo "<h3 style='color: #ffd700; font-size: 2.5em; margin: 0;'>$nbEtudiants</h3>";
            echo "<p style='margin: 10px 0;'>étudiants inscrits dans la base de données</p>";
            echo "</div>";
            
            // Statistiques additionnelles
            $mysqli2 = connecterBDD();
            $sqlStats = "SELECT 
                            SUM(CASE WHEN sexe = 'Homme' THEN 1 ELSE 0 END) as nb_hommes,
                            SUM(CASE WHEN sexe = 'Femme' THEN 1 ELSE 0 END) as nb_femmes,
                            MIN(YEAR(naissance)) as annee_min,
                            MAX(YEAR(naissance)) as annee_max
                         FROM etudiants";
            $resultStats = $mysqli2->query($sqlStats);
            
            if ($resultStats && $rowStats = $resultStats->fetch_assoc()) {
                $nbHommes = $rowStats['nb_hommes'];
                $nbFemmes = $rowStats['nb_femmes'];
                $pourcentageHommes = round(($nbHommes / $nbEtudiants) * 100, 1);
                $pourcentageFemmes = round(($nbFemmes / $nbEtudiants) * 100, 1);
                
                echo "<div class='info-box'>";
                echo "<strong>👥 Répartition par sexe :</strong><br>";
                echo "• <strong>Hommes :</strong> $nbHommes ($pourcentageHommes%)<br>";
                echo "• <strong>Femmes :</strong> $nbFemmes ($pourcentageFemmes%)<br>";
                
                if ($rowStats['annee_min'] && $rowStats['annee_max']) {
                    $ecartGenerationnel = $rowStats['annee_max'] - $rowStats['annee_min'];
                    echo "• <strong>Années de naissance :</strong> " . $rowStats['annee_min'] . " à " . $rowStats['annee_max'] . " (écart: $ecartGenerationnel ans)<br>";
                }
                echo "</div>";
            }
            $mysqli2->close();
            
            // Comparaison avec d'autres tables
            $mysqli3 = connecterBDD();
            $sqlComparaison = "SELECT 
                                (SELECT COUNT(*) FROM salles) as nb_salles,
                                (SELECT COUNT(*) FROM etage) as nb_etages";
            $resultComp = $mysqli3->query($sqlComparaison);
            
            if ($resultComp && $rowComp = $resultComp->fetch_assoc()) {
                echo "<div class='info-box'>";
                echo "<strong>📊 Comparaison avec les autres tables :</strong><br>";
                echo "• <strong>Étudiants :</strong> $nbEtudiants<br>";
                echo "• <strong>Salles :</strong> " . $rowComp['nb_salles'] . "<br>";
                echo "• <strong>Étages :</strong> " . $rowComp['nb_etages'] . "<br>";
                
                $ratioEtudiantsSalles = round($nbEtudiants / $rowComp['nb_salles'], 1);
                echo "• <strong>Ratio étudiants/salles :</strong> $ratioEtudiantsSalles étudiants par salle<br>";
                echo "</div>";
            }
            $mysqli3->close();
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Impossible de compter les étudiants.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job06/index.php">⬅️ Job 06</a>
            <a href="../job08/index.php">➡️ Job 08</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
// Fermer la connexion seulement si elle est encore ouverte
if (isset($mysqli) && $mysqli instanceof mysqli) {
    $mysqli->close();
}
?>