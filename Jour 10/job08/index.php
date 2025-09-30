<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour la capacité totale
$sql = "SELECT SUM(capacite) as capacite_totale FROM salles";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 08 - Capacité totale des salles</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>🏟️ Job 08 - Capacité totale des salles</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Utilisation de la fonction d'agrégation <strong>SUM()</strong></p>
            <p>• Calcul de la capacité totale de toutes les salles</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            // Récupérer les données
            $row = $result->fetch_assoc();
            $capaciteTotale = $row['capacite_totale'] ?? 0;
            
            echo "<div class='stats-box'>";
            echo "<strong>📊 Résultats :</strong> Calcul de la capacité totale effectué<br>";
            echo "<strong>🔍 Fonction utilisée :</strong> SUM(capacite)<br>";
            echo "</div>";
            
            // Affichage du tableau
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<caption>🏟️ Capacité totale du bâtiment</caption>";
            echo "<thead><tr>";
            echo "<th>Capacité totale (personnes)</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td style='text-align: center; font-size: 2em; font-weight: bold; color: #4CAF50;'>$capaciteTotale</td>";
            echo "</tr>";
            echo "</tbody></table>";
            echo "</div>";
            
            // Affichage du résultat en grand
            echo "<div class='info-box' style='text-align: center; font-size: 1.2em;'>";
            echo "<h3 style='color: #ffd700; font-size: 2.5em; margin: 0;'>$capaciteTotale personnes</h3>";
            echo "<p style='margin: 10px 0;'>capacité d'accueil totale du bâtiment</p>";
            echo "</div>";
            
            // Analyse par salle seulement si la capacité totale > 0
            if ($capaciteTotale > 0) {
                $mysqli2 = connecterBDD();
                $sqlAnalyse = "SELECT s.nom as salle, s.capacite, e.nom as etage 
                              FROM salles s 
                              JOIN etage e ON s.id_etage = e.id 
                              ORDER BY s.capacite DESC";
                $resultAnalyse = $mysqli2->query($sqlAnalyse);
                
                if ($resultAnalyse && $resultAnalyse->num_rows > 0) {
                    echo "<div class='info-box'>";
                    echo "<strong>🏢 Analyse par salle :</strong><br>";
                    while ($rowAnalyse = $resultAnalyse->fetch_assoc()) {
                        $pourcentage = round(($rowAnalyse['capacite'] / $capaciteTotale) * 100, 1);
                        echo "• <strong>" . htmlspecialchars($rowAnalyse['salle']) . "</strong> (" . htmlspecialchars($rowAnalyse['etage']) . ") : ";
                        echo $rowAnalyse['capacite'] . " pers. (" . $pourcentage . "%)<br>";
                    }
                    echo "</div>";
                }
                
                // Capacité par étage
                $sqlEtage = "SELECT e.nom, SUM(s.capacite) as capacite_etage 
                            FROM etage e 
                            JOIN salles s ON e.id = s.id_etage 
                            GROUP BY e.id, e.nom 
                            ORDER BY capacite_etage DESC";
                $resultEtage = $mysqli2->query($sqlEtage);
                
                if ($resultEtage && $resultEtage->num_rows > 0) {
                    echo "<div class='info-box'>";
                    echo "<strong>📊 Capacité par étage :</strong><br>";
                    while ($rowEtage = $resultEtage->fetch_assoc()) {
                        $pourcentageEtage = round(($rowEtage['capacite_etage'] / $capaciteTotale) * 100, 1);
                        echo "• <strong>" . htmlspecialchars($rowEtage['nom']) . "</strong> : ";
                        echo $rowEtage['capacite_etage'] . " pers. (" . $pourcentageEtage . "%)<br>";
                    }
                    echo "</div>";
                }
                
                $mysqli2->close();
                
                // Statistiques avancées
                $mysqli3 = connecterBDD();
                $sqlStats = "SELECT 
                                COUNT(*) as nb_salles,
                                MIN(capacite) as capacite_min,
                                MAX(capacite) as capacite_max,
                                AVG(capacite) as capacite_moyenne
                             FROM salles";
                $resultStats = $mysqli3->query($sqlStats);
                
                if ($resultStats && $rowStats = $resultStats->fetch_assoc()) {
                    echo "<div class='info-box'>";
                    echo "<strong>📈 Statistiques détaillées :</strong><br>";
                    echo "• <strong>Nombre de salles :</strong> " . $rowStats['nb_salles'] . "<br>";
                    echo "• <strong>Capacité minimale :</strong> " . $rowStats['capacite_min'] . " pers.<br>";
                    echo "• <strong>Capacité maximale :</strong> " . $rowStats['capacite_max'] . " pers.<br>";
                    echo "• <strong>Capacité moyenne :</strong> " . round($rowStats['capacite_moyenne'], 1) . " pers.<br>";
                    echo "• <strong>Capacité totale :</strong> $capaciteTotale pers.<br>";
                    echo "</div>";
                }
                $mysqli3->close();
                
            } else {
                echo "<div class='info-box'>";
                echo "<strong>⚠️ Attention :</strong> Aucune capacité trouvée dans les salles.<br>";
                echo "</div>";
            }
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Impossible de calculer la capacité totale.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job07/index.php">⬅️ Job 07</a>
            <a href="../job09/index.php">➡️ Job 09</a>
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