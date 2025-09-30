<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour les étudiants nés entre 1998 et 2018
$sql = "SELECT prenom, nom, naissance FROM etudiants WHERE YEAR(naissance) BETWEEN 1998 AND 2018 ORDER BY naissance ASC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 12 - Étudiants nés entre 1998 et 2018</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>🎓 Job 12 - Étudiants nés entre 1998 et 2018</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Utilisation de la fonction <strong>YEAR()</strong> et condition <strong>BETWEEN</strong></p>
            <p>• Filtrage sur une période de 20 ans (1998-2018)</p>
            <p>• Tri chronologique par date de naissance</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='stats-box'>";
            echo "<strong>📊 Résultats :</strong> " . $result->num_rows . " étudiant(s) trouvé(s)<br>";
            echo "<strong>📅 Période :</strong> 1998 à 2018 (20 ans)<br>";
            echo "</div>";
            
            // Réinitialiser le pointeur de résultat
            $result->data_seek(0);
            
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<caption>🎓 Étudiants nés entre 1998 et 2018</caption>";
            echo "<thead><tr>";
            echo "<th>Rang</th>";
            echo "<th>Prénom</th>";
            echo "<th>Nom</th>";
            echo "<th>Date de naissance</th>";
            echo "<th>Année</th>";
            echo "<th>Âge actuel</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            
            $rang = 1;
            $anneeActuelle = date('Y');
            
            while ($row = $result->fetch_assoc()) {
                $anneeNaissance = date('Y', strtotime($row['naissance']));
                $age = $anneeActuelle - $anneeNaissance;
                
                // Icône selon la génération
                $generationIcon = "";
                if ($anneeNaissance >= 1998 && $anneeNaissance <= 2005) {
                    $generationIcon = "🌟"; // Génération Z début
                } else {
                    $generationIcon = "🚀"; // Génération Z fin
                }
                
                echo "<tr>";
                echo "<td>$rang</td>";
                echo "<td>" . htmlspecialchars($row['prenom']) . " $generationIcon</td>";
                echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($row['naissance'])) . "</td>";
                echo "<td><strong>$anneeNaissance</strong></td>";
                echo "<td><span style='color: #4CAF50;'>$age ans</span></td>";
                echo "</tr>";
                $rang++;
            }
            
            echo "</tbody></table>";
            echo "</div>";
            
            // Statistiques supplémentaires
            $result->data_seek(0);
            $annees = [];
            $ages = [];
            
            while ($row = $result->fetch_assoc()) {
                $anneeNaissance = date('Y', strtotime($row['naissance']));
                $age = $anneeActuelle - $anneeNaissance;
                $annees[] = $anneeNaissance;
                $ages[] = $age;
            }
            
            if (!empty($ages)) {
                $ageMin = min($ages);
                $ageMax = max($ages);
                $ageMoyen = round(array_sum($ages) / count($ages), 1);
                $anneeMin = min($annees);
                $anneeMax = max($annees);
                
                echo "<div class='info-box'>";
                echo "<strong>📈 Statistiques détaillées :</strong><br>";
                echo "• <strong>Âge minimum :</strong> $ageMin ans<br>";
                echo "• <strong>Âge maximum :</strong> $ageMax ans<br>";
                echo "• <strong>Âge moyen :</strong> $ageMoyen ans<br>";
                echo "• <strong>Première naissance :</strong> $anneeMin<br>";
                echo "• <strong>Dernière naissance :</strong> $anneeMax<br>";
                echo "• <strong>Écart générationnel :</strong> " . ($anneeMax - $anneeMin) . " ans<br>";
                echo "</div>";
                
                // Répartition par année
                $repartition = array_count_values($annees);
                ksort($repartition);
                
                echo "<div class='info-box'>";
                echo "<strong>📊 Répartition par année de naissance :</strong><br>";
                foreach ($repartition as $annee => $nombre) {
                    $pourcentage = round(($nombre / count($annees)) * 100, 1);
                    echo "• <strong>$annee :</strong> $nombre étudiant(s) ($pourcentage%)<br>";
                }
                echo "</div>";
            }
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Aucun étudiant trouvé pour la période 1998-2018.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job11/index.php">⬅️ Job 11</a>
            <a href="../job13/index.php">➡️ Job 13</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>