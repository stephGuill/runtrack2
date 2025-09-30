<?php
require_once '../config.php';

// Connexion à la base de données
$mysqli = connecterBDD();

// Requête SQL pour trier par capacité croissante
$sql = "SELECT * FROM salles ORDER BY capacite ASC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job 10 - Salles par capacité croissante</title>
    <?php echo getStylesCSS(); ?>
</head>
<body>
    <div class="container">
        <h1>📈 Job 10 - Salles par capacité croissante</h1>
        
        <div class="info-box">
            <h3>📊 Fonctionnement :</h3>
            <p>• Connexion à la base <strong>jour09</strong> avec <code>PHP</code></p>
            <p>• Tri avec <strong>ORDER BY capacite ASC</strong></p>
            <p>• Affichage de toutes les informations des salles</p>
        </div>

        <div class="sql-query">
            <strong>📝 Requête SQL :</strong><br>
            <code><?php echo htmlspecialchars($sql); ?></code>
        </div>

        <?php
        echo genererTableauHTML($result, "📈 Salles triées par capacité (plus petite → plus grande)");
        
        if ($result && $result->num_rows > 0) {
            echo "<div class='info-box'>";
            echo "<strong>🎯 Ordre croissant :</strong><br>";
            $result->data_seek(0);
            $rang = 1;
            while ($row = $result->fetch_assoc()) {
                $emoji = ($row['capacite'] <= 5) ? "🔸" : (($row['capacite'] <= 50) ? "🔹" : "🔷");
                echo "$emoji <strong>$rang. " . htmlspecialchars($row['nom']) . "</strong> : " . $row['capacite'] . " personnes<br>";
                $rang++;
            }
            echo "</div>";
        }
        ?>

        <div class="nav-links">
            <a href="../job09/index.php">⬅️ Job 09</a>
            <a href="../job11/index.php">➡️ Job 11</a>
            <a href="../">🏠 Jour 10</a>
        </div>
    </div>
</body>
</html>

<?php
$mysqli->close();
?>