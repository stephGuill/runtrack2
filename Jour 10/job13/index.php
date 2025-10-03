<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour la jointure salles-étages
$sql = "SELECT salles.nom as nom_salle, etage.nom as nom_etage FROM salles INNER JOIN etage ON salles.id_etage = etage.id ORDER BY etage.nom ASC, salles.nom ASC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 13 - Jointure salles-étages</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1> Job 13 - Jointure salles-étages</h1>
        
        <div class="info-box">
            <h3> Fonctionnement :</h3>
            <p>• Connexion à la base jour09 avec <code>PHP</code></p>
            <p>• Utilisation d'un INNER JOIN entre les tables</p>
            <p>• Liaison sur les clés : salles.id_etage = etage.id</p>
            <p>• Tri par étage puis par nom de salle</p>
        </div>

        <div class="sql-query">
            <p> Requête SQL :</p><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        if ($result && $result->num_rows > 0) {
            echo "<div class='stats-box'>";
            echo "<p> Résultats :</p> " . $result->num_rows . " association(s) salle-étage<br>";
            echo "<p> Type de jointure :</p> INNER JOIN<br>";
            echo "</div>";
            
            // Réinitialiser le pointeur de résultat
            $result->data_seek(0);
            
            echo "<div class='table-container'>";
            echo "<table class='data-table'>";
            echo "<caption> Associations salles-étages</caption>";
            echo "<thead><tr>";
            echo "<th>Rang</th>";
            echo "<th>Nom de la salle</th>";
            echo "<th>Nom de l'étage</th>";
            echo "<th>Localisation</th>";
            echo "</tr></thead>";
            echo "<tbody>";
            
            $rang = 1;
            $etageActuel = "";
            $compteurEtage = [];
            
            while ($row = $result->fetch_assoc()) {
                $nomEtage = $row['nom_etage'];
                $nomSalle = $row['nom_salle'];
                
                // Compteur par étage
                if (!isset($compteurEtage[$nomEtage])) {
                    $compteurEtage[$nomEtage] = 0;
                }
                $compteurEtage[$nomEtage]++;
                
                // Icône selon l'étage
                $etageIcon = "";
                switch (strtolower($nomEtage)) {
                    case 'rdc':
                    case 'rez-de-chaussée':
                        $etageIcon = "";
                        break;
                    case '1er étage':
                    case 'premier étage':
                        $etageIcon = "";
                        break;
                    case '2ème étage':
                    case '2e étage':
                    case 'deuxième étage':
                        $etageIcon = "";
                        break;
                    case '3ème étage':
                    case '3e étage':
                    case 'troisième étage':
                        $etageIcon = "";
                        break;
                    default:
                        $etageIcon = "";
                }
                
                // Indicateur de changement d'étage
                $classEtage = "";
                if ($etageActuel != $nomEtage) {
                    $classEtage = "style='background-color: rgba(255, 215, 0, 0.1);'";
                    $etageActuel = $nomEtage;
                }
                
                echo "<tr $classEtage>";
                echo "<td>$rang</td>";
                echo "<td><p>" . htmlspecialchars($nomSalle) . "</p></td>";
                echo "<td>" . htmlspecialchars($nomEtage) . " $etageIcon</td>";
                echo "<td><em>" . htmlspecialchars($nomSalle) . " - " . htmlspecialchars($nomEtage) . "</em></td>";
                echo "</tr>";
                $rang++;
            }
            
            echo "</tbody></table>";
            echo "</div>";
            
            // Statistiques par étage
            if (!empty($compteurEtage)) {
                echo "<div class='info-box'>";
                echo "<p> Répartition des salles par étage :</p><br>";
                arsort($compteurEtage); // Trier par nombre de salles décroissant
                
                $totalSalles = array_sum($compteurEtage);
                foreach ($compteurEtage as $etage => $nombre) {
                    $pourcentage = round(($nombre / $totalSalles) * 100, 1);
                    
                    // Icône selon l'étage
                    $etageIcon = "";
                    switch (strtolower($etage)) {
                        case 'rdc':
                        case 'rez-de-chaussée':
                            $etageIcon = "";
                            break;
                        case '1er étage':
                        case 'premier étage':
                            $etageIcon = "";
                            break;
                        case '2ème étage':
                        case '2e étage':
                        case 'deuxième étage':
                            $etageIcon = "";
                            break;
                        case '3ème étage':
                        case '3e étage':
                        case 'troisième étage':
                            $etageIcon = "";
                            break;
                        default:
                            $etageIcon = "";
                    }
                    
                    echo "• <p>" . htmlspecialchars($etage) . " $etageIcon :</p> $nombre salle(s) ($pourcentage%)<br>";
                }
                echo "• <p>Total :</p> $totalSalles salles dans " . count($compteurEtage) . " étage(s)<br>";
                echo "</div>";
            }
            
            // --- Vérification de l'intégrité des données (HACK) ---
            // Cette section permet de vérifier la cohérence entre les données des tables 'salles' et 'etage'.
            // On s'assure que chaque salle a bien un étage associé et on détecte les éventuelles incohérences.

            echo "<div class='info-box'>";
            echo "<p> Vérification des données :</p><br>";

            /*
                On ouvre une nouvelle connexion à la base de données pour ne pas perturber le curseur du premier résultat.
                Cela permet de faire d'autres requêtes sans interférer avec la boucle principale d'affichage.
            */
            $mysqli2 = connecterBDD();

            // On compte le nombre total de salles dans la table 'salles'
            $sqlTotalSalles = "SELECT COUNT(*) as total FROM salles";
            $resultTotal = $mysqli2->query($sqlTotalSalles);
            $totalSalles = 0;
            if ($resultTotal && $resultTotal->num_rows > 0) {
                $rowTotal = $resultTotal->fetch_assoc();
                $totalSalles = $rowTotal['total'];
            }

            // On compte le nombre total d'étages dans la table 'etage'
            $sqlTotalEtages = "SELECT COUNT(*) as total FROM etage";
            $resultEtages = $mysqli2->query($sqlTotalEtages);
            $totalEtages = 0;
            if ($resultEtages && $resultEtages->num_rows > 0) {
                $rowEtages = $resultEtages->fetch_assoc();
                $totalEtages = $rowEtages['total'];
            }

            // Affichage des statistiques de cohérence
            echo "• <p>Salles dans la base :</p> $totalSalles<br>"; // Nombre total de salles dans la table
            echo "• <p>Salles avec étage :</p> " . $result->num_rows . "<br>";
            echo "• <p>Étages dans la base :</p> $totalEtages<br>";
            echo "• <p>Étages utilisés :</p> " . count($compteurEtage) . "<br>";
            
            if ($totalSalles == $result->num_rows) {
                echo "• <span style='color: #4CAF50;'> Toutes les salles ont un étage assigné</span><br>";
            } else {
                $sallesSansEtage = $totalSalles - $result->num_rows;
                echo "• <span style='color: #ff5722;'> $sallesSansEtage salle(s) sans étage assigné</span><br>";
            }
            
            $mysqli2->close();
            echo "</div>";
            
        } else {
            echo "<div class='no-data'>";
            echo "<p>Aucune association salle-étage trouvée.</p>";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job12/index.php"> Job 12</a>
            <a href="../"> Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>