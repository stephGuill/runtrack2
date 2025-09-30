<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour la capacité moyenne
$sql = "SELECT AVG(capacite) as capacite_moyenne FROM salles";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 11 - Capacité moyenne des salles</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>📊 Job 11 - Capacité moyenne des salles</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Utilisation de la fonction d'agrégation <strong>AVG()</strong></p>
            <p>• Calcul automatique de la moyenne des capacités</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            // D'abord récupérer les données avant d'utiliser genererTableauHTML
            $row = $result->fetch_assoc();
            $moyenne = round($row['capacite_moyenne'] ?? 0, 2);
            
            // Réinitialiser le pointeur pour genererTableauHTML
            $result->data_seek(0);
            
            echo genererTableauHTML($result, "📊 Capacité moyenne des salles");
            
            echo "<div class='info-box' style='text-align: center; font-size: 1.2em;'>";
            echo "<h3 style='color: #ffd700; font-size: 2em; margin: 0;'>$moyenne personnes</h3>";
            echo "<p style='margin: 10px 0;'>capacité moyenne par salle</p>";
            echo "</div>";
            
            // Comparaison avec chaque salle seulement si moyenne > 0
            if ($moyenne > 0) {
                $mysqli2 = connecterBDD();
                $sqlSalles = "SELECT nom, capacite FROM salles ORDER BY capacite DESC";
                $resultSalles = $mysqli2->query($sqlSalles);
                
                if ($resultSalles && $resultSalles->num_rows > 0) {
                    echo "<div class='info-box'>";
                    echo "<strong>📈 Comparaison avec la moyenne :</strong><br>";
                    while ($rowSalle = $resultSalles->fetch_assoc()) {
                        $capacite = $rowSalle['capacite'];
                        $ecart = $capacite - $moyenne;
                        
                        if ($ecart > 0) {
                            $status = "🔺 +" . round($ecart, 1) . " (au-dessus)";
                            $color = "color: #4CAF50;";
                        } elseif ($ecart < 0) {
                            $status = "🔻 " . round($ecart, 1) . " (en-dessous)";
                            $color = "color: #ff5722;";
                        } else {
                            $status = "🎯 exactement la moyenne";
                            $color = "color: #ffd700;";
                        }
                        
                        echo "• <strong>" . htmlspecialchars($rowSalle['nom']) . "</strong> : ";
                        echo $capacite . " pers. <span style='$color'>$status</span><br>";
                    }
                    echo "</div>";
                }
                $mysqli2->close();
            } else {
                echo "<div class='info-box'>";
                echo "<strong>⚠️ Attention :</strong> Aucune capacité moyenne calculée.<br>";
                echo "</div>";
            }
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Impossible de calculer la capacité moyenne.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job10/index.php">⬅️ Job 10</a>
            <a href="../job12/index.php">➡️ Job 12</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>