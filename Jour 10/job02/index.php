<?php
require_once '../config.php';

// Connexion à la base de données avec MySQLi
$mysqli = connecterBDD();

// Requête SQL pour récupérer nom et capacité des salles
$sql = "SELECT nom, capacite FROM salles";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 02 - Nom et capacité des salles</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1> Job 02 - Nom et capacité des salles</h1>
        
        <div class="info-box">
            <h3> Fonctionnement :</h3>
            <p>• Connexion à la base jour09 avec <code>mysqli</code></p>
            <p>• Sélection spécifique des colonnes nom et capacité</p>
            <p>• Affichage optimisé pour la consultation des capacités</p>
        </div>

        <div class="sql-query">
            <p> Requête SQL :</p><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, " Salles et leurs capacités");
        
        // Calcul de la capacité totale
        if ($result && $result->num_rows > 0) {
            // Reset du pointeur pour recalculer
            $result->data_seek(0);
            $capaciteTotal = 0;
            while ($row = $result->fetch_assoc()) {
                $capaciteTotal += $row['capacite'];
            }
            
            echo "<div class='info-box'>";
            echo " Statistiques :<br>";
            echo "• Nombre de salles : " . $result->num_rows . "<br>";
            echo "• Capacité totale : " . $capaciteTotal . " personnes<br>";
            echo "• Capacité moyenne : " . round($capaciteTotal / $result->num_rows, 1) . " personnes";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job01/index.php"> Job 01</a>
            <a href="../job03/index.php"> Job 03</a>
            <a href="../"> Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>