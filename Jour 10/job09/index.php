<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour trier par capacité décroissante
$sql = "SELECT * FROM salles ORDER BY capacite DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 09 - Salles par capacité décroissante</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>📊 Job 09 - Salles par capacité décroissante</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Tri avec <strong>ORDER BY capacite DESC</strong></p>
            <p>• Affichage de toutes les informations des salles</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        echo genererTableauHTML($result, "📊 Salles triées par capacité (plus grande → plus petite)");
        
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo "<strong>🏆 Classement des salles :</strong><br>";
            $result->data_seek(0);
            $rang = 1;
            while ($row = $result->fetch_assoc()) {
                $emoji = ($rang == 1) ? "🥇" : (($rang == 2) ? "🥈" : (($rang == 3) ? "🥉" : "🏅"));
                echo "$emoji <strong>$rang. " . htmlspecialchars($row['nom']) . "</strong> : " . $row['capacite'] . " personnes<br>";
                $rang++;
            }
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job08/index.php">⬅️ Job 08</a>
            <a href="../job10/index.php">➡️ Job 10</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>