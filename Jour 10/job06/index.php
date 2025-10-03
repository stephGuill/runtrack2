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
        <h1> Job 06 - Nom et capacité des salles</h1>
        
        <div class="info-box">
            <h3> Fonctionnement :</h3>
            <p>• Connexion à la base jour09 avec <code>PHP</code></p>
            <p>• Sélection spécifique des colonnes nom et capacite</p>
            <p>• Tri alphabétique par nom de salle</p>
        </div>

        <div class="sql-query">
            <p> Requête SQL :</p><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='stats-box'>";
            echo "<p> Résultats :</p> " . $result->num_rows . " salle(s) trouvée(s)<br>";
            echo "<p> Colonnes affichées :</p> nom, capacite<br>";
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
            echo "<caption> Liste des salles avec leur capacité</caption>";
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
                    $categorie = " Grande salle";
                    $couleur = "#4CAF50";
                } elseif ($capacite >= 30) {
                    $categorie = " Salle moyenne";
                    $couleur = "#FF9800";
                } elseif ($capacite >= 10) {
                    $categorie = " Petite salle";
                    $couleur = "#2196F3";
                } else {
                    $categorie = " Très petite";
                    $couleur = "#9C27B0";
                }
                
                echo "<tr>";
                echo "<td>$rang</td>";
                echo "<td><p>" . htmlspecialchars($nom) . "</p></td>";
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
                echo "<p> Statistiques de capacité :</p><br>";
                echo "• <p>Capacité minimale :</p> $capaciteMin personnes<br>";
                echo "• <p>Capacité maximale :</p> $capaciteMax personnes<br>";
                echo "• <p>Capacité moyenne :</p> $capaciteMoyenne personnes<br>";
                echo "• <p>Capacité totale :</p> $capaciteTotal personnes<br>";
                echo "• <p>Écart min-max :</p> " . ($capaciteMax - $capaciteMin) . " personnes<br>";
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
                echo "<p> Répartition par catégorie :</p><br>";
                foreach ($categories as $cat => $listeSalles) {
                    $nb = count($listeSalles);
                    $noms = implode(', ', $listeSalles);
                    echo "• $cat : $nb salle(s) - $noms<br>";
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
            <a href="../job05/index.php"> Job 05</a>
            <a href="../job07/index.php"> Job 07</a>
            <a href="../"> Jour 10</a>
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