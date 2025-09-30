<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour les étudiants de moins de 18 ans
$sql = "SELECT * FROM etudiants 
        WHERE YEAR(CURDATE()) - YEAR(naissance) < 18 
           OR (YEAR(CURDATE()) - YEAR(naissance) = 18 
               AND DAYOFYEAR(CURDATE()) < DAYOFYEAR(naissance))";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 05 - Étudiants de moins de 18 ans</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>👶 Job 05 - Étudiants de moins de 18 ans</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Calcul d'âge précis avec <strong>YEAR() et DAYOFYEAR()</strong></p>
            <p>• Condition complexe pour gérer les anniversaires dans l'année</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        // Génération du tableau HTML
        echo genererTableauHTML($result, "👶 Étudiants mineurs (< 18 ans)");
        
        // Calcul des âges exacts
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo "<strong>📊 Détails des âges :</strong><br>";
            
            $result->data_seek(0);
            while ($row = $result->fetch_assoc()) {
                $naissance = new DateTime($row['naissance']);
                $maintenant = new DateTime();
                $age = $maintenant->diff($naissance)->y;
                
                echo "• <strong>" . htmlspecialchars($row['prenom']) . " " . htmlspecialchars($row['nom']) . "</strong> : ";
                echo $age . " ans (né le " . date('d/m/Y', strtotime($row['naissance'])) . ")<br>";
            }
            echo "</div>";
        } else {
            echo "<div class='info-box'>";
            echo "<strong>ℹ️ Information :</strong><br>";
            echo "Aucun étudiant mineur trouvé dans la base de données";
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job04/index.php">⬅️ Job 04</a>
            <a href="../job06/index.php">➡️ Job 06</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>