<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour sélectionner nom et capacité des salles
$sql = "SELECT nom, capacite FROM salles ORDER BY nom ASC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 06 - Nom et capacité des salles</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>🏢 Job 06 - Nom et capacité des salles</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Sélection spécifique des colonnes <strong>nom</strong> et <strong>capacite</strong></p>
            <p>• Tri alphabétique par nom de salle</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='stats-box'>";
            echo "<strong>📊 Résultats :</strong> " . $result->num_rows . " salle(s) trouvée(s)<br>";
            echo "<strong>📋 Colonnes affichées :</strong> nom, capacite<br>";
            echo "</div>";
            
            // Stocker toutes les données dans un array pour éviter de réutiliser $result
            $salles = [];
            $capacites = [];
            $capaciteTotal = 0;
            
            while ($row = $result->fetch_assoc()) {
                $salles[] = $row;
                $capacites[] = (int)$row['capacite'];
                $capaciteTotal += (int)$row['capacite'];
            }
            
            // Maintenant on peut fermer le result car on a toutes les données
            $result->free();
            
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<caption>🏢 Liste des salles avec leur capacité</caption>";
            echo "<thead><tr>";
            echo "<th>Rang</th>";
            echo "<th>Nom de la salle</th>";
            echo "<th>Capacité</th>";
            echo "<th>Pourcentage du total</th>";
            echo "<th>Catégorie</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            
            $rang = 1;
            foreach ($salles as $salle) {
                $nom = $salle['nom'];
                $capacite = (int)$salle['capacite'];
                $pourcentage = round(($capacite / $capaciteTotal) * 100, 1);
                
                // Catégorie selon la capacité
                if ($capacite >= 80) {
                    $categorie = "🏟️ Grande salle";
                    $couleur = "#4CAF50";
                } elseif ($capacite >= 30) {
                    $categorie = "🏛️ Salle moyenne";
                    $couleur = "#FF9800";
                } elseif ($capacite >= 10) {
                    $categorie = "🏠 Petite salle";
                    $couleur = "#2196F3";
                } else {
                    $categorie = "🔸 Très petite";
                    $couleur = "#9C27B0";
                }
                
                echo "<tr>";
                echo "<td>$rang</td>";
                echo "<td><strong>" . htmlspecialchars($nom) . "</strong></td>";
                echo "<td style='text-align: center; font-weight: bold; color: $couleur;'>$capacite pers.</td>";
                echo "<td>$pourcentage%</td>";
                echo "<td>$categorie</td>";
                echo "</tr>";
                $rang++;
            }
            
            echo "</tbody></table>";
            echo "</div>";
            
            // Statistiques détaillées
            if (!empty($capacites)) {
                $capaciteMin = min($capacites);
                $capaciteMax = max($capacites);
                $capaciteMoyenne = round(array_sum($capacites) / count($capacites), 1);
                
                echo "<div class='info-box'>";
                echo "<strong>📈 Statistiques de capacité :</strong><br>";
                echo "• <strong>Capacité minimale :</strong> $capaciteMin personnes<br>";
                echo "• <strong>Capacité maximale :</strong> $capaciteMax personnes<br>";
                echo "• <strong>Capacité moyenne :</strong> $capaciteMoyenne personnes<br>";
                echo "• <strong>Capacité totale :</strong> $capaciteTotal personnes<br>";
                echo "• <strong>Écart min-max :</strong> " . ($capaciteMax - $capaciteMin) . " personnes<br>";
                echo "</div>";
                
                // Répartition par catégorie
                $categories = [];
                foreach ($salles as $salle) {
                    $capacite = (int)$salle['capacite'];
                    if ($capacite >= 80) {
                        $categories['Grande salle'][] = $salle['nom'];
                    } elseif ($capacite >= 30) {
                        $categories['Salle moyenne'][] = $salle['nom'];
                    } elseif ($capacite >= 10) {
                        $categories['Petite salle'][] = $salle['nom'];
                    } else {
                        $categories['Très petite'][] = $salle['nom'];
                    }
                }
                
                echo "<div class='info-box'>";
                echo "<strong>🏛️ Répartition par catégorie :</strong><br>";
                foreach ($categories as $cat => $listeSalles) {
                    $nb = count($listeSalles);
                    $noms = implode(', ', $listeSalles);
                    echo "• <strong>$cat :</strong> $nb salle(s) - $noms<br>";
                }
                echo "</div>";
            }
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Aucune salle trouvée.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job05/index.php">⬅️ Job 05</a>
            <a href="../job07/index.php">➡️ Job 07</a>
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